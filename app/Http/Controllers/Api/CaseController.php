<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cases;
use App\Models\CaseClient;
use App\Models\CaseLawyer;
use Validator;
use JWTAuth;
use App\Traits\APITokenTrait;

class CaseController extends Controller
{
    use APITokenTrait;

    protected function guard()
    {
        return Auth::guard('api');
    }

    public function index(Request $request){
        // \DB::enableQueryLog();
        $page = $request->input('page', 0);
        $limit = $request->input('limit', 10);
        $search_key = $request->input('q', null);

        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        if($user->user_type == 'C'){
            $cases = Cases::select('id', 'type', 'title', 'description', 'status', 'inactive', 'created_at')->with(['case_clients' => function($q) use($user){
                return $q->where('customer_id', $user->id);
            }]);
        } else {
            $cases = Cases::with(['case_lawyers' => function($q) use($user){
                $q->where('lawyer_id', $user->id);
            }]);
        }


        if ($search_key) {
            $cases = $cases->where(function ($q) use ($search_key) {
                $q->where('id', 'LIKE', "%{$search_key}%");
                $q->orWhere('title', 'LIKE', "%{$search_key}%");
                $q->orWhere('description', 'LIKE', "%{$search_key}%");
            });
        }        

        $pending_cases = $cases->get()->filter(function ($c){
             return $c->status == 1;
        })->count();

        $completed_cases = $cases->get()->filter(function ($c){
             return $c->status == 4;
        })->count();        

        $cases = $cases->paginate($limit, $page);

        return api_success_response(API_REQUEST_SUCCESS, ['pending_cases' => $pending_cases, 'completed_cases' => $completed_cases, 'cases' => $cases]);
    }

    public function favorite_handler(Request $request){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        $validator = Validator::make($request->all(), [
            'case'          => 'required|integer'
        ]);

        if ($validator->fails()) {
            return api_error_response(API_REQUEST_SUCCESS, implode('', $validator->errors()->all()));
        } else {
            $input = $request->input();
            if($user->user_type == 'C'){
                $case = CaseClient::where(['case_id' => $input['case'], 'customer_id' => $user->id])->first();
            } else {
                $case = CaseLawyer::where(['case_id' => $input['case'], 'lawyer_id' => $user->id])->first();
            }

            if($case){

                $case->is_favorite = ($case->is_favorite == 0 ? 1 : 0);
                $case->save();
                return api_success_response(API_REQUEST_SUCCESS, ['message' => $case->is_favorite == 0 ? 'Case has been remove from favorites.' : 'Case has been marked as favorite.']);

                
            } else {
                return api_error_response(API_REQUEST_SUCCESS, ['message' => 'You are not added for this Case.']);
            }
            
        }

    }
}
