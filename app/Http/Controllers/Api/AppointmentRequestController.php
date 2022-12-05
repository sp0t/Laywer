<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Traits\APITokenTrait;
use App\Traits\TimezoneTrait;
use App\Models\AppointmentRequest;
use App\Models\Appointment;
use App\Models\AppointmentParticipant;
use Validator;
use Camroncade\Timezone\Facades\Timezone;
use DB;

class AppointmentRequestController extends Controller
{
    use APITokenTrait, TimezoneTrait;

    protected function guard()
    {
        return Auth::guard('api');
    }  

    public function request_appointment(Request $request){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        if($user->user_type != "C"){
            return api_error_response(API_REQUEST_SUCCESS, 'Not allowed action. For clients only.');            
        }

        $validator = Validator::make($request->all(), [
            'title'             => 'required',
            'request_date'      => 'required',
            'request_time'      => 'required',
            'timezone'          => 'required',
            'remark'            => 'required',
        ]); 

        if ($validator->fails()) {
            return api_error_response(API_REQUEST_SUCCESS, implode('', $validator->errors()->all()));
        } else {
            $input = $request->input();

            $date_time = $this->convertToUTC($input['request_date'], $input['request_time'], $input['timezone']);

            $appointmentrequest = new AppointmentRequest();
            $appointmentrequest->title           = $input['title'];
            $appointmentrequest->request_date    = $date_time[0];
            $appointmentrequest->request_time    = $date_time[1];
            $appointmentrequest->timezone        = $input['timezone'];
            $appointmentrequest->remark          = $input['remark'];
            $appointmentrequest->created_by      = $user->id;
            $appointmentrequest->save();

            return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Appointment request created successfully.']);            
        }        
    }

    public function get_appointment_requests(Request $request){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        if($user->user_type != "C"){
            return api_error_response(API_REQUEST_SUCCESS, 'Not allowed action. For clients only.');            
        }

        $page = $request->input('page', 0);
        $limit = $request->input('limit', 10);

        $appointmentrequests = AppointmentRequest::select('id', 'title', 'request_date', 'request_time', 'timezone', 'remark', 'status', 'created_at')
                        ->where('created_by', $user->id)
                        ->orderBy('id', 'desc');        

        $appointmentrequests = $appointmentrequests->paginate($limit, $page);
        foreach ($appointmentrequests as $appointmentrequest) {
            $date_time = $this->convertFromUTC($appointmentrequest->request_date, $appointmentrequest->request_time, $appointmentrequest->timezone);
            $appointmentrequest->request_date = $date_time[0];
            $appointmentrequest->request_time = $date_time[1];
            $status = $appointmentrequest->status;
            $appointmentrequest->status =  $status == 0 ? 'Pending' : ( $status == 1 ? 'Accepeted' : 'Rejected');
        }

        return api_success_response(API_REQUEST_SUCCESS, ['requests' => $appointmentrequests]);                          

    }

    public function get_request_edit(Request $request, $id){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        $appointmentrequest = AppointmentRequest::where(['created_by' => $user->id, 'id' => $id])->first();

        if($appointmentrequest){
            if($appointmentrequest->status != 0){
                return api_error_response(API_REQUEST_SUCCESS, 'Appointment has been reviewed already.');    
            }

            $date_time = $this->convertFromUTC($appointmentrequest->request_date, $appointmentrequest->request_time, $appointmentrequest->timezone);
            $appointmentrequest->request_date = $date_time[0];
            $appointmentrequest->request_time = $date_time[1];
            $status = $appointmentrequest->status;
            $appointmentrequest->status =  $status == 0 ? 'Pending' : ( $status == 1 ? 'Accepeted' : 'Rejected');            

            return api_success_response(API_REQUEST_SUCCESS, ['request' => $appointmentrequest]);
        } else {
            return api_error_response(API_REQUEST_SUCCESS, 'Appointment request not found.');            
        }

    }

    public function update_request_by_customer(Request $request, $id){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }
        $validator = Validator::make($request->all(), [
            'title'             => 'required',
            'request_date'      => 'required',
            'request_time'      => 'required',
            'timezone'          => 'required',
            'remark'            => 'required',
        ]); 

        if ($validator->fails()) {
            return api_error_response(API_REQUEST_SUCCESS, implode('', $validator->errors()->all()));
        }

        $appointmentrequest = AppointmentRequest::where(['created_by' => $user->id, 'id' => $id])->first();

        if($appointmentrequest){
            $input = $request->input();

            $appointmentrequest->title           = $input['title'];
            $appointmentrequest->request_date    = $input['request_date'];
            $appointmentrequest->request_time    = $input['request_time'];
            $appointmentrequest->timezone        = $input['timezone'];
            $appointmentrequest->remark          = $input['remark'];

            $appointmentrequest->save();
            return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Appointment request updated successfully.']);
        } else {
            return api_error_response(API_REQUEST_SUCCESS, 'Appointment request not found.');            
        }
    }

    public function delete_request(Request $request, $id){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        $appointmentrequest = AppointmentRequest::where(['created_by' => $user->id, 'id' => $id])->first();

        if($appointmentrequest){
            if($appointmentrequest->status != 0){
                return api_error_response(API_REQUEST_SUCCESS, 'Appointment has been reviewed already.');    
            }
            $appointmentrequest->delete();
            return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Appointment request deleted successfully.']);
        } else {
            return api_error_response(API_REQUEST_SUCCESS, 'Appointment request not found.');            
        }                
    }

    public function reject_appointment_request(Request $request, $id){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        if($user->user_type == "C"){
            return api_error_response(API_REQUEST_SUCCESS, 'Not allowed action. For lawyers only.');            
        }

        $appointmentrequest = AppointmentRequest::where(['id' => $id, 'status' => 0])->first();

        if($appointmentrequest){
            $appointmentrequest->status = 2;
            $appointmentrequest->save();
            return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Appointment request rejected successfully.']);
        } else {
            return api_error_response(API_REQUEST_SUCCESS, 'Appointment request not found.');            
        } 

    }

    public function convert_request_appointment(Request $request, $id){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        if($user->user_type == "C"){
            return api_error_response(API_REQUEST_SUCCESS, 'Not allowed action. For lawyers only.');            
        }

        $validator = Validator::make($request->all(), [
            'title'             => 'required',
            'request_date'      => 'required',
            'request_time'      => 'required',
            'timezone'          => 'required',
            'remark'            => 'required',
            'location'          => 'required',
            'users'             => 'required|array',
            'clients'           => 'required|array',
            'lawyers'           => 'required|array',
        ]); 

        if ($validator->fails()) {
            return api_error_response(API_REQUEST_SUCCESS, implode('', $validator->errors()->all()));
        }
        $input = $request->input();

        $appointmentrequest = AppointmentRequest::where(['id' => $id, 'status' => 0])->first();

        if($appointmentrequest){
            try {
                
                DB::beginTransaction();
                $appointmentrequest->status = 1;
                $appointmentrequest->save();

                $date_time = $this->convertToUTC($input['request_date'], $input['request_time'], $input['timezone']);

                $appointment = new Appointment();
                $appointment->title         = $input['title'];
                $appointment->request_date  = $date_time[0];
                $appointment->request_time  = $date_time[1];
                $appointment->timezone      = $input['timezone'];  
                $appointment->remark        = $input['remark'];  
                $appointment->location      = $input['location'];  
                $appointment->requested_by  = $appointmentrequest->created_by;
                $appointment->created_by    = $user->id;
                $appointment->request_id    = $appointmentrequest->id;

                $appointment->save();

                foreach ($input['users'] as $user_obj) {
                    $appointmentparticipant = new AppointmentParticipant();
                    $appointmentparticipant->appointment_id = $appointment->id;
                    $appointmentparticipant->participant_id = $user_obj;
                    $appointmentparticipant->type           = 'u';
                    $appointmentparticipant->added_by       = $user->id;
                    $appointmentparticipant->save();
                }

                foreach ($input['clients'] as $client) {
                    $appointmentparticipant = new AppointmentParticipant();
                    $appointmentparticipant->appointment_id = $appointment->id;
                    $appointmentparticipant->participant_id = $client;
                    $appointmentparticipant->type           = 'c';
                    $appointmentparticipant->added_by       = $user->id;
                    $appointmentparticipant->save();
                }  

                foreach ($input['lawyers'] as $lawyer) {
                    $appointmentparticipant = new AppointmentParticipant();
                    $appointmentparticipant->appointment_id = $appointment->id;
                    $appointmentparticipant->participant_id = $lawyer;
                    $appointmentparticipant->type           = 'l';
                    $appointmentparticipant->added_by       = $user->id;
                    $appointmentparticipant->save();
                }                                

                DB::commit();

                return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Appointment request converted successfully.']);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => FALSE, 'msg' => 'Error occured while saving...', 'e' => $e]);
            }            
        } else {
            return api_error_response(API_REQUEST_SUCCESS, 'Appointment request not found.');            
        }            
    }
}
