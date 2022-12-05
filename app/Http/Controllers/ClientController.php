<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Validator;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use DataTables;

class ClientController extends Controller
{
    public function index()
    {
        $page_meta = [
            'page_title'        => 'Clients',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'clients'
        ];        
        return view('clients.index', compact('page_meta'));
    }

    public function load_ajax(Request $request) {
        $input = $request->input();        
        $customers = Customer::select(['customers.id', 'customers.name', 'customers.contact_no', 'customers.email', 'customers.verified', 'customers.inactive', 'customers.created_at', 'customers.updated_at'])
            ->where('is_client', 1);

        return Datatables::of($customers)
                        ->editColumn('name', function($obj) {
                            return '<div class="media"><div class="mr-3"><a href="'.route('client.view', [$obj->id]).'"><img src="assets/global_assets/images/demo/users/user-icon-placeholder.png" width="40" height="40" class="rounded-circle" alt=""></a></div><div class="media-body align-self-center"><a href="'.route('client.view', [$obj->id]).'" class="font-weight-semibold">'.$obj->name.'</a></div></div>';
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
                            <a href="'.route('client.view', [$obj->id]).'" class="list-icons-item text-teal"><i class="icon-eye"></i></a>
                            <a href="'.route('client.edit', [$obj->id]).'" class="list-icons-item text-primary"><i class="icon-pencil7"></i></a>
                            <a href="#" class="list-icons-item text-danger delete-item"><i class="icon-trash"></i></a></div>';
                        })
                        ->rawColumns(['name', 'verified', 'inactive', 'actions'])
                        ->make(TRUE);
    }

    public function create(){
        $page_meta = [
            'page_title'        => 'Create Client',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'clients'
        ];        

        return view('clients.add', compact('page_meta'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name'              => 'required|string|min:5',
            'contact_person'    => 'required|string|min:5',
            'address'           => 'required|string',
            'official_address'  => 'required|string',
            'contact_no'        => 'required|unique:customers,contact_no',
            'email'             => 'required|email|unique:customers,email|max:255',
            'password'          => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => FALSE, 'msg' => implode('<br>', $validator->errors()->all())]);
        } else {
            $input = $request->input();

            $client = Customer::create([
                'name'              => $input['name'],
                'contact_person'    => $input['contact_person'],
                'address'           => $input['address'],
                'official_address'  => $input['official_address'],
                'contact_no'        => $input['contact_no'],
                'email'             => $input['email'],
                'password'          => bcrypt($input['password']),                
                'os_type'           => 'W',
                'verified'          => 1,
                'is_client'         => 1,
                'created_by'        => Auth::user()->id
            ]);

            $redirect_url = route('client.edit', [$client->id]);

            return response()->json(['status' => TRUE, 'msg' => 'Client details added successfully.', 'redirect_url' => $redirect_url]);
        }
    }

    public function edit($id){
        $client = Customer::findOrFail($id);

        $page_meta = [
            'page_title'        => 'Edit Client',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'clients'
        ];        

        $cases      = null;
        $payments   = null;

        return view('clients.edit', compact('page_meta', 'client', 'cases', 'payments'));        
    }

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'name'              => 'required|string|min:5',
            'contact_person'    => 'required|string|min:5',
            'address'           => 'required|string',
            'official_address'  => 'required|string',
            'contact_no'        => 'required|unique:customers,contact_no,' . $id,
            'email'             => 'required|email|max:255|unique:customers,email,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => FALSE, 'msg' => implode('<br>', $validator->errors()->all())]);
        } else {
            $input = $request->input();

            $client = Customer::findOrFail($id);
            $client->name               = $input['name'];
            $client->contact_person     = $input['contact_person'];
            $client->address            = $input['address'];
            $client->official_address   = $input['official_address'];
            $client->contact_no         = $input['contact_no'];
            $client->email              = $input['email'];
            $client->inactive           = isset($input['inactive']) ? 1 : 0;

            if(isset($input['demote_client'])){
                $client->is_client      = 0;    
            }

            if(!is_null($input['password']) && !empty($input['password'])){
                $client->password = bcrypt($input['password']);                
            }         

            try {
                DB::beginTransaction();
                $client->save();
                DB::commit();
                \Session::flash('success', 'Client details updated successfully.');
                return response()->json(['status' => TRUE, 'msg' => 'Client details updated successfully.']);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => FALSE, 'msg' => 'Error occured while saving...', 'e' => $e]);
            }
        }
    }        

    public function view($id){
        $client = Customer::findOrFail($id);

        $page_meta = [
            'page_title'        => 'View Client',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'clients'
        ];        

        return view('clients.view', compact('page_meta', 'client'));
    }    
}
