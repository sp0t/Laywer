<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Validator;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use DataTables;

class CustomerController extends Controller
{
    public function index()
    {
        $page_meta = [
            'page_title'        => 'Customers',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'customer'
        ];        
        return view('customers.index', compact('page_meta'));
    }

    public function load_ajax(Request $request) {
        $input = $request->input();        
        $customers = Customer::select(['customers.id', 'customers.name', 'customers.contact_no', 'customers.email', 'customers.verified', 'customers.inactive', 'customers.created_at', 'customers.updated_at'])
            ->where('is_client', 0);

        return Datatables::of($customers)
                        ->editColumn('name', function($obj) {
                            return '<div class="media"><div class="mr-3"><a href="'.route('customer.view', [$obj->id]).'"><img src="assets/global_assets/images/demo/users/user-icon-placeholder.png" width="40" height="40" class="rounded-circle" alt=""></a></div><div class="media-body align-self-center"><a href="'.route('customer.view', [$obj->id]).'" class="font-weight-semibold">'.$obj->name.'</a></div></div>';
                        })             
                        ->editColumn('verified', function($obj) {
                            return $obj->verified == 0 ? '<span class="badge badge-danger">No</span>' : '<span class="badge badge-success">Yes</span>';
                        })        
                        ->editColumn('inactive', function($obj) {
                            return $obj->inactive == 1 ? '<span class="badge badge-danger">Inactive</span>' : '<span class="badge badge-success">Active</span>';
                        })
                        ->editColumn('created_at', function($obj) {
                            return date('d-m-Y', strtotime($obj->created_at));
                        })
                        ->editColumn('updated_at', function($obj) {
                            return date('d-m-Y', strtotime($obj->updated_at));
                        })                            
                        ->addColumn('actions', function($obj) {
                            return '<div class="list-icons">
                            <a href="'.route('customer.view', [$obj->id]).'" class="list-icons-item text-teal"><i class="icon-eye"></i></a>
                            <a href="'.route('customer.edit', [$obj->id]).'" class="list-icons-item text-primary"><i class="icon-pencil7"></i></a>
                            <a href="#" class="list-icons-item text-danger delete-item"><i class="icon-trash"></i></a></div>';
                        })
                        ->rawColumns(['name', 'verified', 'inactive', 'actions'])
                        ->make(TRUE);
    }

    public function create(){
        $page_meta = [
            'page_title'        => 'Create Customer',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'customer'
        ];        

        return view('customers.add', compact('page_meta'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|min:5',
            'contact_no'    => 'required|unique:customers,contact_no',
            'email'         => 'required|email|unique:customers,email|max:255',
            'password'      => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => FALSE, 'msg' => implode('<br>', $validator->errors()->all())]);
        } else {
            $input = $request->input();

            $customer = Customer::create([
                'name'          => $input['name'],
                'contact_no'    => $input['contact_no'],
                'email'         => $input['email'],
                'password'      => bcrypt($input['password']),                
                'os_type'       => 'W',
                'verified'      => 1,
                'created_by'    => Auth::user()->id
            ]);

            $redirect_url = route('customer.edit', [$customer->id]);
            \Session::flash('success', 'Customer details added successfully.');
            return response()->json(['status' => TRUE, 'msg' => 'Customer details added successfully.', 'redirect_url' => $redirect_url]);
        }
    }

    public function edit($id){
        $customer = Customer::findOrFail($id);

        $page_meta = [
            'page_title'        => 'Edit Customer',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'customer'
        ];        

        return view('customers.edit', compact('page_meta', 'customer'));        
    }

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|min:5',
            'contact_no'    => 'required|unique:customers,contact_no,' . $id,
            'email'         => 'required|email|max:255|unique:customers,email,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => FALSE, 'msg' => implode('<br>', $validator->errors()->all())]);
        } else {
            $input = $request->input();

            $customer = Customer::findOrFail($id);
            $customer->name         = $input['name'];
            $customer->contact_no   = $input['contact_no'];
            $customer->email        = $input['email'];
            $customer->inactive     = isset($input['inactive']) ? 1 : 0;

            if(!is_null($input['password']) && !empty($input['password'])){
                $customer->password = bcrypt($input['password']);                
            }

            if(isset($input['promote_as_client'])){
                $customer->is_client     = 1;
            }

            try {
                DB::beginTransaction();
                $customer->save();
                DB::commit();
                \Session::flash('success', 'Customer details updated successfully.');
                return response()->json(['status' => TRUE, 'msg' => 'Customer details updated successfully.']);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => FALSE, 'msg' => 'Error occured while saving...', 'e' => $e]);
            }
        }
    }

    public function view($id){
        $customer = Customer::findOrFail($id);

        $page_meta = [
            'page_title'        => 'View Customer',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'customer'
        ];        

        return view('customers.view', compact('page_meta', 'customer'));
    }
}
