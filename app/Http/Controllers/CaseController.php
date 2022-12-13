<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Validator;
use App\Models\Cases;
use App\Models\CaseType;
use App\Models\CaseLawyer;
use App\Models\CaseClient;
use App\Models\CaseMilestone;
use App\Models\CaseDocuments;
use App\Models\CasePayment;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use DataTables;
use App\Helpers\Functions;
use Illuminate\Support\Str;

class CaseController extends Controller
{
    public function index()
    {
        $page_meta = [
            'page_title'        => 'Cases',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'cases'
        ];        
        return view('cases.index', compact('page_meta'));
    }

    public function load_ajax(Request $request) {

        $input = $request->input();        
        $cases = Cases::select(['cases.id', 'cases.type', 'cases.title', 'cases.created_at', 'cases.status', 'cases.inactive'])->with(['case_lawyers', 'case_clients']);

        $status     = _case_status();

        return Datatables::of($cases)
                        ->editColumn('id', function($obj) {
                            return str_pad($obj['id'], 4, '0', STR_PAD_LEFT);
                        })
                        ->addColumn('lawyers', function($obj) {
                            return $obj->case_lawyers()->count();
                        }) 
                        ->addColumn('clients', function($obj) {
                            return $obj->case_clients()->count();
                        })                                                               
                        ->editColumn('status', function($obj) use($status){
                            $class = '';
                            if ($obj->status == 1){
                                $class = 'badge-primary';
                            } elseif ($obj->status == 2) {
                                $class = 'badge-warning';
                            } elseif ($obj->status == 3) {
                                $class = 'badge-yellow';
                            } elseif ($obj->status == 3) {
                                $class = 'badge-success';                                
                            } else {
                                $class = 'badge-light';
                            }
                            $html = '<span class="badge '.$class.'">'.$status[$obj->status].'</span>';

                            return $html;
                        })        
                        ->editColumn('inactive', function($obj) {
                            return $obj->inactive == 1 ? '<span class="badge badge-danger">Inactive</span>' : '<span class="badge badge-success">Active</span>';
                        })
                        ->editColumn('created_at', function($obj) {
                            return date('d-m-Y', strtotime($obj->created_at));
                        })                           
                        ->addColumn('actions', function($obj) {
                            return '<div class="list-icons">
                            <a href="'.route('client.view', [$obj->id]).'" class="list-icons-item text-teal"><i class="icon-eye"></i></a>
                            <a href="'.route('case.edit', [$obj->id]).'" class="list-icons-item text-primary"><i class="icon-pencil7"></i></a>
                            <a href="#" class="list-icons-item text-danger delete-item"><i class="icon-trash"></i></a></div>';
                        })
                        ->rawColumns(['status', 'inactive', 'actions'])
                        ->make(TRUE);
    }

    public function create() {
        
        $page_meta = [
            'page_title'        => 'Create Case',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'cases'
        ];
        
        $types         = CaseType::get();
        $caseMilestone = [];

        $caseInfo      = Cases::where('status', 0)
            ->where('created_by', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->first();

        $cleintInfo        = [];
        $CaseLawyerInfo    = [];
        $documentList      = [];
        $pendingPayment    = [];
        $completedPayment  = [];
        
        if(!empty($caseInfo )) {

            $cleintInfo     = CaseClient::where('case_id', $caseInfo->id)->get();
            $CaseLawyerInfo = CaseLawyer::where('case_id', $caseInfo->id)->get();

            $caseMilestone  = CaseMilestone::where('status', 0)
                ->where('mpl_id', $caseInfo->id)
                ->get();

            $completedPayment = CasePayment::where('status', 1)
                 ->where('case_id', $caseInfo->id)
                ->get();

            $pendingPayment   = CasePayment::leftjoin('cases','case_payments.case_id','cases.id')
                ->where('case_payments.status', 0)
                ->select('case_payments.*','cases.title')
                 ->where('case_payments.case_id', $caseInfo->id)
                ->get();

            $documentList = CaseDocuments::where('case_id', $caseInfo->id)
                ->leftjoin('users','case_documents.created_by','=','users.id')
                ->select('users.name as userName','case_documents.*')
                ->get();
        }
 
        $lawyers       = User::where(['status'=> 1, 'user_type' => 1])->get();
        $clients       = Customer::where(['verified'=> 1, 'is_client' => 1, 'inactive' => 0])->get();

        return view('cases.add-new-case-tab', compact('page_meta', 'types', 'lawyers', 'clients', 'caseMilestone', 'pendingPayment', 'completedPayment', 'caseInfo', 'CaseLawyerInfo', 'cleintInfo','documentList'));
    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(), [
            'type'          => 'required',
            'title'         => 'required|string|min:5',
            'description'   => 'required',
            'lawyers'       => 'required|array',
            'clients'       => 'required|array'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => FALSE, 'msg' => implode('<br>', $validator->errors()->all())]);
        } else {
            
            $input = $request->input();

            if(!empty($input['case_id'])) {
                $case =  Cases::findOrFail($input['case_id']);
            } else {
               $case = new Cases(); 
            }

            
            $case->type         = $input['type'];
            $case->title        = $input['title'];
            $case->description  = $input['description'];
            $case->created_by   = Auth::user()->id;

            try {
                DB::beginTransaction();
                $case->save();

                $lawyers = $input['lawyers'];

                foreach($lawyers as $lawyer){
                    $caselawyer = new CaseLawyer();
                    $caselawyer->case_id    = $case->id;
                    $caselawyer->lawyer_id  = $lawyer;
                    $caselawyer->save();
                }

                $clients = $input['clients'];
                
                foreach($clients as $client){
                    $caseclient = new CaseClient();
                    $caseclient->case_id        = $case->id;
                    $caseclient->customer_id    = $client;
                    $caseclient->save();
                }
                DB::commit();

                $redirect_url = route('case.edit', [$case->id]).'?tab=milestone';
                \Session::flash('success', 'Case details added successfully.');
                return response()->json(['status' => TRUE, 'msg' => 'Case added updated successfully.', 'redirect_url' => $redirect_url, 'case_id' =>  $case->id ]);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => FALSE, 'msg' => 'Error occured while saving...', 'e' => $e]);
            }
        }
    }

    public function payment(Request $request){
      
        $validator = Validator::make($request->all(), [
            'payment_by'    => 'required',
            'amount'        => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => FALSE, 'msg' => implode('<br>', $validator->errors()->all())]);
        } else {
            
            $input = $request->input();

            $case = new CasePayment();
            $case->payment_by      = $input['payment_by'];
            $case->amount          = $input['amount'];
            $case->date            = $input['date'];
            $case->status          = $input['payment_status'];
            $case->case_id         = $input['case_id'];
            $case->invoice_number  = date('Ymdhim');
            $case->created_by      = Auth::user()->id;

            try {

                DB::beginTransaction();

                $case->save();

                DB::commit();
                $pendingPayment   = CasePayment::leftjoin('cases','case_payments.case_id','cases.id')
                    ->where('case_payments.status', 0)
                    ->select('case_payments.*','cases.title')
                     ->where('case_payments.case_id', $input['case_id'])
                    ->get();

                $completedPayment = CasePayment::where('status', 1)
                     ->where('case_id', $input['case_id'])
                    ->get();
               
                return view('cases.payment_ajax', compact('pendingPayment','completedPayment'));

            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => FALSE, 'msg' => 'Error occured while saving...', 'e' => $e]);
            }
        }
    }

    public function edit(Request $request, $id) {

        $case = Cases::with(['case_lawyers', 'case_clients'])->findOrFail($id);

        $page_meta = [
            'page_title'        => 'Edit Case',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'cases'
        ];
        $input = $request->input();        
        $tab                = isset($input['tab']) ? $input['tab'] : null;
        $types              = CaseType::pluck('name', 'id');
        $lawyers            = User::where(['status'=> 1, 'user_type' => 1])->pluck('name', 'id');
        $clients            = Customer::where(['verified'=> 1, 'is_client' => 1, 'inactive' => 0])->pluck('name', 'id');
        $status             = _case_status();
        $milestone_status   = _case_milestone_status();

        return view('cases.edit', compact('page_meta', 'case', 'types', 'lawyers', 'clients', 'status', 'milestone_status', 'tab'));        
    }

    public function update(Request $request, $id){
        
        $validator = Validator::make($request->all(), [
            'type'          => 'required',
            'title'         => 'required|string|min:5',
            'description'   => 'required',
            'lawyers'       => 'required|array',
            'clients'       => 'required|array'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => FALSE, 'msg' => implode('<br>', $validator->errors()->all())]);
        } else {
            
            $input = $request->input();

            $case = Cases::with(['case_lawyers', 'case_clients'])->findOrFail($id);

            $case->type         = $input['type'];
            $case->title        = $input['title'];
            $case->description  = $input['description'];
            $case->status       = $input['status'];
            $case->inactive     = isset($input['inactive']) ? 1 : 0;

            try {
                DB::beginTransaction();
                $case->save();

                $lawyers_old = $case->case_lawyers()->pluck('lawyer_id')->toArray();
                $lawyers = $input['lawyers'];

                $compared = $this->_compare_selections($lawyers_old, $lawyers);

                if(sizeof($compared[0]) > 0){
                    foreach($compared[0] as $lawyer){
                        $caselawyer = CaseLawyer::where(['case_id' => $case->id, 'lawyer_id' => $lawyer])->first();
                        if(!is_null($caselawyer)){
                            $caselawyer->delete();    
                        }  
                    }
                }

                if(sizeof($compared[1]) > 0){
                    foreach($compared[1] as $lawyer){
                        $caselawyer = new CaseLawyer();
                        $caselawyer->case_id    = $case->id;
                        $caselawyer->lawyer_id  = $lawyer;
                        $caselawyer->save();
                    }                    
                }   

                $clients_old = $case->case_clients()->pluck('customer_id')->toArray();
                $clients = $input['clients'];

                $compared = $this->_compare_selections($clients_old, $clients);

                if(sizeof($compared[0]) > 0){
                    foreach($compared[0] as $client){
                        $caseclient = CaseClient::where(['case_id' => $case->id, 'customer_id' => $client])->first();
                        if(!is_null($caseclient)){
                            $caseclient->delete();    
                        }  
                    }
                }

                if(sizeof($compared[1]) > 0){
                    foreach($compared[1] as $client){
                        $caseclient = new CaseClient();
                        $caseclient->case_id        = $case->id;
                        $caseclient->customer_id    = $client;
                        $caseclient->save();
                    }                    
                }         
                
                DB::commit();
                \Session::flash('success', 'Case details updated successfully.');
                return response()->json(['status' => TRUE, 'msg' => 'Case details updated successfully.']);
            } catch (\Exception $e) {
                DB::rollback();
                dd($e);
                return response()->json(['status' => FALSE, 'msg' => 'Error occured while saving...', 'e' => $e]);
            }
        }
    }

    private function _compare_selections($array1, $array2){
        $removed = array_diff($array1,$array2);
        $added = array_diff($array2,$array1);
        return [
            $removed,
            $added
        ];
    }
    // ->-->--->---->-----> milestone <-----<----<---<--<-

    public function load_ajax_milestone(Request $request) {

        $input = $request->input();        
        $milestones = CaseMilestone::select(['case_milestones.id', 'case_milestones.title', 'case_milestones.description', 'case_milestones.target_date', 'case_milestones.status', 'users.name as created_by', 'case_milestones.created_at', 'case_milestones.mpl_id'])
            ->join('users', 'users.id', 'case_milestones.created_by');

        $status     = _case_milestone_status();

        return Datatables::of($milestones)
                        ->editColumn('id', function($obj) {
                            return '#'.$obj['id'];
                        })
                        ->editColumn('title', function($obj) {
                            $html = '<div class="font-weight-semibold"><a href="">'.$obj->title.'</a></div><div class="text-muted">'.Str::limit($obj->description, 30).'</div>';
                            return $html;
                        })
                        ->editColumn('status', function($obj) use($status){
                            $html = '<select name="status" class="custom-select milestone-status" data-id="'.$obj->id.'">';

                            foreach ($status as $k => $v) {
                                $html .= '<option value="'.$k.'"'.($k == $obj->status ? 'selected' : '').'>'.$v.'</open>';
                            }

                            $html .= '</select>';

                            return $html;
                        })
                        ->editColumn('target_date', function($obj) {
                            return '<i class="icon-calendar2 mr-2"></i> '.date('d-m-Y', strtotime($obj->target_date));
                        })  
                        ->editColumn('created_at', function($obj) {
                            return date('d-m-Y', strtotime($obj->created_at));
                        })                                                   
                        ->addColumn('actions', function($obj) {
                            return '<div class="list-icons">
                                        <a href="'.route('case.milestones.view', [$obj->mpl_id, $obj->id]).'" class="list-icons-item text-teal milestone-view"><i class="icon-eye"></i></a>
                                        <a href="'.route('case.milestones.edit', [$obj->mpl_id, $obj->id]).'" class="list-icons-item text-primary milestone-edit"><i class="icon-pencil7"></i></a>
                                    </div>';
                        })
                        ->removeColumn(['description', 'mpl_id'])
                        ->rawColumns(['title', 'target_date', 'status', 'created_at', 'actions'])
                        ->make(TRUE);
    }

    public function milestone_popup($id, $milestone = null){
        $item = null;
        if(!is_null($milestone)){
            $item = CaseMilestone::findOrFail($milestone);
        }
        $milestone_status   = _case_milestone_status();

        $view = view('cases.popup.milestone', compact('item', 'id', 'milestone', 'milestone_status'))->render();
        return response()->json(['status' => TRUE, 'msg' => '', 'html' => $view]);
    }

    public function milestone_popup_view($id, $milestone = null){

        $item = null;
        $view = true;
        if(!is_null($milestone)){
            $item = CaseMilestone::findOrFail($milestone);
        }
        $milestone_status   = _case_milestone_status();

        $view = view('cases.popup.milestone', compact('item', 'id', 'milestone', 'milestone_status', 'view'))->render();
        return response()->json(['status' => TRUE, 'msg' => '', 'html' => $view]);
    }    

    public function milestone_save(Request $request, $id, $milestone = null){

        $validator = Validator::make($request->all(), [
            'title'        => 'required',
            'date'         => 'required',
            'description'  => 'required',
            'status'       => 'required'
        ]);        

        if ($validator->fails()) {
            return response()->json(['status' => FALSE, 'msg' => implode('<br>', $validator->errors()->all())]);
        } else {
            
            $input = $request->input();

            $item = null;
            if(!is_null($milestone)){
                $item = CaseMilestone::findOrFail($milestone);
                if(is_null($item)){
                    return response()->json(['status' => FALSE, 'msg' => 'Milestone not found']);
                }
            } else {
                $item = new CaseMilestone();
                $item->created_by   = Auth::user()->id;
            }

            $item->mpl_id       = $id;
            $item->title        = $input['title']; 
            $item->description  = $input['description'];
            $item->target_date  = $input['date'];
            $item->status       = $input['status'];

            try {
                DB::beginTransaction();
                $item->save(); 

                DB::commit();
                \Session::flash('success', 'Milestone details added/updated successfully.');
                return response()->json(['status' => TRUE, 'msg' => 'Milestone details added/updated successfully.']);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => FALSE, 'msg' => 'Error occured while saving...', 'e' => $e]);
            }
        }
    }

    public function update_milestone_status(Request $request, $id, $milestone)
    {
        $validator = Validator::make($request->all(), [
            'status'       => 'required'
        ]);        

        if ($validator->fails()) {
            return response()->json(['status' => FALSE, 'msg' => implode('<br>', $validator->errors()->all())]);
        } else {
            
            $input = $request->input();

            $item = CaseMilestone::findOrFail($milestone);
            if(is_null($item)){
                return response()->json(['status' => FALSE, 'msg' => 'Milestone not found']);
            }

            $item->status       = $input['status'];        

            try {
                DB::beginTransaction();
                $item->save(); 

                DB::commit();
                \Session::flash('success', 'Milestone status updated successfully.');
                return response()->json(['status' => TRUE, 'msg' => 'Milestone status updated successfully.']);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => FALSE, 'msg' => 'Error occured while saving...', 'e' => $e]);
            }            
        }
    }
    
    /**
     * [caseFinalSubmit description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function caseFinalSubmit(Request $request) {

        $case =  Cases::findOrFail($request->case_id);
        $case->status = 1;
        $case->save();
    }
}
