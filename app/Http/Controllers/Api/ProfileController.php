<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\Traits\APITokenTrait;
use App\Models\Customer;
use App\Models\User;
use Validator;

class ProfileController extends Controller
{
    use APITokenTrait;

    protected function guard()
    {
        return Auth::guard('api');
    }

    public function get_profile_data(Request $request){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }
        unset($user->password);
        unset($user->otp);
        unset($user->verified);
        unset($user->created_by);
        unset($user->inactive);
        unset($user->created_by);
        unset($user->created_at);
        unset($user->updated_at);
        unset($user->deleted_at);
        unset($user->last_login_at);

        return api_success_response(API_REQUEST_SUCCESS, ['user' => $user]);

    }

    public function update_profile_data(Request $request){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'address'       => 'required',
            'contact_no'    => 'required',
            'email'         => 'required|email',
        ]);

        if ($validator->fails()) {
            return api_error_response(API_REQUEST_SUCCESS, implode('', $validator->errors()->all()));
        }

        $input = $request->input();
        if($user->user_type == 'C'){
            $customer = Customer::findOrFail($user->id);

            if($customer){
                $check_email = Customer::where(['email' => $input['email']])->where('id', '!=', $customer->id)->count();
                if($check_email > 0){
                    return api_error_response(API_REQUEST_SUCCESS, 'Email already been used.');
                }

                $customer->name = $input['name'];
                $customer->address = $input['address'];
                $customer->contact_no = $input['contact_no'];
                $customer->email = $input['email'];

                if(isset($input['contact_person'])){
                    $customer->contact_person = $input['contact_person'];
                }

                if(isset($input['official_address'])){
                    $customer->official_address = $input['official_address'];
                }                

                $customer->save();

                return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Profile data updated successfully.']);
            } else {
                return api_error_response(API_REQUEST_SUCCESS, ['message' => 'Account not found.']);
            }
        } else {

            $user = User::findOrFail($user->id);

            if($user){

                $check_email = Customer::where(['email' => $input['email']])->where('id', '!=', $user->id)->count();
                if($check_email > 0){
                    return api_error_response(API_REQUEST_SUCCESS, 'Email already been used.');
                }

                $user->name = $input['name'];
                $user->address = $input['address'];
                $user->contact_no1 = $input['contact_no'];
                $user->email = $input['email'];

                if(isset($input['contact_no2'])){
                    $user->contact_no2 = $input['contact_no1'];
                }

                $user->save();   

                return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Profile data updated successfully.']);         
            } else {
                return api_error_response(API_REQUEST_SUCCESS, ['message' => 'Account not found.']);
            }
        }
    }

    public function set_password(Request $request){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        $validator = Validator::make($request->all(), [
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return api_error_response(API_REQUEST_SUCCESS, implode('', $validator->errors()->all()));
        }

        $input = $request->input();
        if($user->user_type == 'C'){
            $customer = Customer::findOrFail($user->id);

            if($customer){

                $customer->password = bcrypt($input['password']);
                $customer->save();

                return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Password updated successfully.']);
            } else {
                return api_error_response(API_REQUEST_SUCCESS, ['message' => 'Account not found.']);
            }
        } else {

            $user = User::findOrFail($user->id);

            if($user){

                $user->password = bcrypt($input['password']);
                $user->save();   

                return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Password updated successfully.']);         
            } else {
                return api_error_response(API_REQUEST_SUCCESS, ['message' => 'Account not found.']);
            }
        }        
    } 
}
