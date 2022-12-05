<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Validator;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Illuminate\Support\Facades\Session;

class LawyerController extends Controller
{
    public function index()
    {
        $page_meta = [
            'page_title'        => 'Lawyers',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'lawyers'
        ];        
        return view('lawyers.index', compact('page_meta'));
    }

    public function load_ajax(Request $request) {
        $input = $request->input();        
        $users = User::select(['users.id', 'users.name', 'users.contact_no1', 'users.email', 'users.status', 'users.created_at', 'users.updated_at'])
            ->where('users.user_type', 1);

        return Datatables::of($users)
                        ->editColumn('name', function($obj) {
                            return '<div class="media"><div class="mr-3"><a href="'.route('lawyer.view', [$obj->id]).'"><img src="assets/global_assets/images/demo/users/user-icon-placeholder.png" width="40" height="40" class="rounded-circle" alt=""></a></div><div class="media-body align-self-center"><a href="'.route('lawyer.view', [$obj->id]).'" class="font-weight-semibold">'.$obj->name.'</a></div></div>';
                        })                  
                        ->editColumn('status', function($obj) {
                            return $obj->status == 0 ? '<span class="badge badge-danger">Inactive</span>' : '<span class="badge badge-success">Active</span>';
                        })
                        ->editColumn('created_at', function($obj) {
                            return date('d-m-Y', strtotime($obj->created_at));
                        })
                        ->editColumn('updated_at', function($obj) {
                            return date('d-m-Y', strtotime($obj->updated_at));
                        })                            
                        ->addColumn('actions', function($obj) {
                            return '<div class="list-icons">
                            <a href="'.route('lawyer.view', [$obj->id]).'" class="list-icons-item text-teal"><i class="icon-eye"></i></a>
                            <a href="'.route('lawyer.edit', [$obj->id]).'" class="list-icons-item text-primary"><i class="icon-pencil7"></i></a>
                            <a href="#" class="list-icons-item text-danger"><i class="icon-trash"></i></a></div>';
                        })
                        ->rawColumns(['name', 'verified', 'status', 'actions'])
                        ->make(TRUE);
    }

    public function create(){
        $page_meta = [
            'page_title'        => 'Create Lawyers',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'lawyers'
        ];        

        return view('lawyers.add', compact('page_meta'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|min:5',
            'address'       => 'required|string',
            'contact_no1'   => 'required',
            'email'         => 'required|email|unique:users,email|max:255',
            'password'      => 'required|min:6',
            'role'          => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => FALSE, 'msg' => implode('<br>', $validator->errors()->all())]);
        } else {
            $input = $request->input();

            $user = User::create([
                'name'          => $input['name'],
                'address'       => $input['address'],
                'contact_no1'   => $input['contact_no1'],
                'contact_no2'   => $input['contact_no2'],
                'email'         => $input['email'],
                'role'          => $input['role'],
                'password'      => bcrypt($input['password']),                
                'user_type'     => 1,
                'status'        => 1,
                'created_by'    => Auth::user()->id
            ]);

            $redirect_url = route('lawyer.edit', [$user->id]);
            Session::flash('success', 'Lawyer created successfully.');
            return response()->json(['status' => TRUE, 'msg' => 'Lawyer details added successfully.', 'redirect_url' => $redirect_url]);
        }
    }

    public function edit($id){
        $lawyer = User::findOrFail($id);

        $page_meta = [
            'page_title'        => 'Edit Lawyer',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'lawyers'
        ];        
        
        return view('lawyers.edit', compact('page_meta', 'lawyer'));  
    } 

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|min:5',
            'address'       => 'required|string',
            'contact_no1'   => 'required',
            'email'         => 'required|email|max:255|unique:users,email,' . $id,
            'role'          => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => FALSE, 'msg' => implode('<br>', $validator->errors()->all())]);
        } else {
            $input = $request->input();

            $lawyer = User::findOrFail($id);
            $lawyer->name           = $input['name'];
            $lawyer->address        = $input['address'];
            $lawyer->contact_no1    = $input['contact_no1'];
            $lawyer->contact_no2    = $input['contact_no2'];
            $lawyer->email          = $input['email'];
            $lawyer->role           = $input['role'];
            $lawyer->status         = isset($input['inactive']) ? 0 : 1;

            if(!is_null($input['password']) && !empty($input['password'])){
                $lawyer->password = bcrypt($input['password']);                
            }

            try {
                DB::beginTransaction();
                $lawyer->save();
                DB::commit();
                \Session::flash('success', 'Lawyer details updated successfully.');
                return response()->json(['status' => TRUE, 'msg' => 'Lawyer details updated successfully.']);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => FALSE, 'msg' => 'Error occured while saving...', 'e' => $e]);
            }
        } 
    }

    public function view($id){
        $lawyer = User::findOrFail($id);

        $page_meta = [
            'page_title'        => 'View Lawyer',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'lawyers'
        ];        

        return view('lawyers.view', compact('page_meta', 'lawyer'));
    }                
}
