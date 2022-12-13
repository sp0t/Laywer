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
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use DataTables;
use App\Helpers\Functions;
use Illuminate\Support\Str;
use Redirect;


class MilestoneController extends Controller
{
    public function index()
    {
        $page_meta = [
            'page_title'        => 'Cases Type',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'cases'
        ];        
        return view('master_data.cases_type.index', compact('page_meta'));
    }

    public function load_ajax(Request $request) {

        $input = $request->input();        

        $cases = CaseType::select(['case_types.id', 'case_types.name'])->get();


        return Datatables::of($cases)
                ->editColumn('id', function($obj) {
                    return str_pad($obj['id'], 4, '0', STR_PAD_LEFT);
                })
                ->editColumn('created_at', function($obj) {
                    return date('d-m-Y', strtotime($obj->created_at));
                })                           
                ->addColumn('actions', function($obj) {
                    return '<div class="list-icons">
                    <a href="'.route('case_type.edit', [$obj->id]).'" class="list-icons-item text-primary"><i class="icon-pencil7"></i></a>
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

        $types = CaseType::get();
        $lawyers = User::where(['status'=> 1, 'user_type' => 1])->get();
        $clients = Customer::where(['verified'=> 1, 'is_client' => 1, 'inactive' => 0])->get();

        return view('master_data.cases_type.create', compact('page_meta', 'types', 'lawyers', 'clients'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'milestone_title'         => 'required|string|min:4',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => FALSE, 'msg' => implode('<br>', $validator->errors()->all())]);
        } else {
            
            $input = $request->input();

            $case = new CaseMilestone();

            $case->mpl_id          = $input['case_id'];
            $case->title           = $input['milestone_title'];
            $case->description     = $input['milestone_descraption'];
            $case->target_date     = $input['date'];
            $case->status          = 0;
            $case->created_by      = Auth::user()->id;
 
            try {
                DB::beginTransaction();
                $case->save();

                DB::commit();
                \Session::flash('success', 'Case details added successfully.');


                $caseMilestone = CaseMilestone::where('status', 0)
                    ->where('mpl_id', $input['case_id'])
                    ->get();
               
                return view('cases.milestone_view', compact(  'caseMilestone'));

            } catch (\Exception $e) {
                DB::rollback();
                 return Redirect::to('cases/type');
            }
        }
    }

    public function editInfo(Request $request, $id){
       
        $case = CaseType::findOrFail($id);

        $page_meta = [
            'page_title'        => 'Edit Case',
            'page_description'  => '',
            'page_keywords'     => '',
            'page_image'        => '',
            'active_page'       => 'cases'
        ];


        return view('master_data.cases_type.edit', compact('page_meta', 'case'));        
    }

    public function update(Request $request, $id){
        
        
        $validator = Validator::make($request->all(), [
            'milestone_title'         => 'required|string|min:4',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => FALSE, 'msg' => implode('<br>', $validator->errors()->all())]);
        } else {
            
            $input = $request->input();
         
            $case =  CaseMilestone::findOrFail($id);
            $case->title           = $input['milestone_title'];
            $case->description     = $input['milestone_descraption'];
            $case->target_date     = $input['date'];
            $case->status          = 0;
            $case->created_by      = Auth::user()->id;
 
            try {
                DB::beginTransaction();
                $case->save();

                DB::commit();
                \Session::flash('success', 'Case details added successfully.');


                $caseMilestone = CaseMilestone::where('status', 0)
                    ->where('mpl_id', $input['case_id'])
                    ->get();
               
                return view('cases.milestone_view', compact(  'caseMilestone'));

            } catch (\Exception $e) {
                DB::rollback();
                 return Redirect::to('cases/type');
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
}
