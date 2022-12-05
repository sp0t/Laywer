<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Traits\APITokenTrait;
use App\Traits\TimezoneTrait;
use App\Models\Appointment;
use App\Models\AppointmentParticipant;
use Validator;
use Camroncade\Timezone\Facades\Timezone;
use DB;

class AppointmentController extends Controller
{
    use APITokenTrait, TimezoneTrait;

    protected function guard()
    {
        return Auth::guard('api');
    }

    public function create_discussion(Request $request){
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

            try {
                
                DB::beginTransaction();

                $date_time = $this->convertToUTC($input['request_date'], $input['request_time'], $input['timezone']);

                $appointment = new Appointment();
                $appointment->title         = $input['title'];
                $appointment->request_date  = $date_time[0];
                $appointment->request_time  = $date_time[1];
                $appointment->timezone      = $input['timezone'];  
                $appointment->remark        = $input['remark'];  
                $appointment->location      = $input['location'];  
                $appointment->created_by    = $user->id;

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

                return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Appointment added successfully.']);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => FALSE, 'msg' => 'Error occured while saving...', 'e' => $e]);
            }                
    }

    public function get_appointments(Request $request){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        if($user->user_type == "C"){
            return api_error_response(API_REQUEST_SUCCESS, 'Not allowed action. For lawyers only.');            
        }

        $page = $request->input('page', 0);
        $limit = $request->input('limit', 10);

        $appointments = Appointment::select('id', 'title', 'request_date', 'request_time', 'timezone', 'location', 'remark', 'status', 'created_at')
                        ->where('created_by', $user->id)
                        ->orderBy('id', 'desc');        

        $appointments = $appointments->paginate($limit, $page);
        foreach ($appointments as $appointment) {
            $date_time = $this->convertFromUTC($appointment->request_date, $appointment->request_time, $appointment->timezone);
            $appointment->request_date = $date_time[0];
            $appointment->request_time = $date_time[1];
            $status = $appointment->status;
            $appointment->status =  $status == 0 ? 'Active' : ( $status == 1 ? 'Completed' : 'Cancelled');
        }

        return api_success_response(API_REQUEST_SUCCESS, ['appointments' => $appointments]);                          

    }

    public function delete_appointment(Request $request, $id){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        if($user->user_type == "C"){
            return api_error_response(API_REQUEST_SUCCESS, 'Not allowed action. For lawyers only.');            
        }

        $appointments = Appointment::where(['created_by' => $user->id, 'status' => 0, 'id' => $id])->first();

        if($appointments){
            if($appointments->status != 0){
                return api_error_response(API_REQUEST_SUCCESS, 'Appointment can not delete at the current status.');                
            }

            $appointmentparticipants = AppointmentParticipant::where('appointment_id', $id)->delete();

            $appointments->delete();

            return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Appointment deleted successfully.']);                          

        } else {
            return api_error_response(API_REQUEST_SUCCESS, 'Appointment not found.');            
        }

    }

    public function get_appointment(Request $request, $id){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        if($user->user_type == "C"){
            return api_error_response(API_REQUEST_SUCCESS, 'Not allowed action. For lawyers only.');            
        }

        $appointment = Appointment::where(['created_by' => $user->id, 'id' => $id])->first();        
        if($appointment){
            if($appointment->status != 0){
                return api_error_response(API_REQUEST_SUCCESS, 'Appointment can not be edited at the current status.');                
            }            
            $date_time = $this->convertFromUTC($appointment->request_date, $appointment->request_time, $appointment->timezone);
            $appointment->request_date = $date_time[0];
            $appointment->request_time = $date_time[1];            
            $appointment->users        = AppointmentParticipant::where(['appointment_id' => $id, 'type' => 'u'])->pluck('participant_id');
            $appointment->clients      = AppointmentParticipant::where(['appointment_id' => $id, 'type' => 'c'])->pluck('participant_id');
            $appointment->lawyers      = AppointmentParticipant::where(['appointment_id' => $id, 'type' => 'l'])->pluck('participant_id');

            return api_success_response(API_REQUEST_SUCCESS, ['appointment' => $appointment]);                          

        } else {
            return api_error_response(API_REQUEST_SUCCESS, 'Appointment not found.');            
        }        
    }

    public function update_appointment(Request $request, $id){
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

        $appointment = Appointment::where(['created_by' => $user->id, 'status' => 0, 'id' => $id])->first();        

        if($appointment){
            $input = $request->input();
            try {
                
                DB::beginTransaction();

                $date_time = $this->convertToUTC($input['request_date'], $input['request_time'], $input['timezone']);

                $appointment->title         = $input['title'];
                $appointment->request_date  = $date_time[0];
                $appointment->request_time  = $date_time[1];
                $appointment->timezone      = $input['timezone'];  
                $appointment->remark        = $input['remark'];  
                $appointment->location      = $input['location'];  
                $appointment->created_by    = $user->id;

                $appointment->save();

                $users = AppointmentParticipant::where(['appointment_id' => $id, 'type' => 'u'])->pluck('participant_id')->toArray();
                $this->_compare_and_update_selection($users, $input['users'], $id, 'u', $user->id);

                $clients = AppointmentParticipant::where(['appointment_id' => $id, 'type' => 'c'])->pluck('participant_id')->toArray();
                $this->_compare_and_update_selection($clients, $input['clients'], $id, 'c', $user->id);

                $lawyers = AppointmentParticipant::where(['appointment_id' => $id, 'type' => 'l'])->pluck('participant_id')->toArray();
                $this->_compare_and_update_selection($lawyers, $input['lawyers'], $id, 'l', $user->id);

                DB::commit();

                return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Appointment added successfully.']);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['status' => FALSE, 'msg' => 'Error occured while saving...', 'e' => $e]);
            } 
        } else {
            return api_error_response(API_REQUEST_SUCCESS, 'Appointment not found.');            
        } 
    }

    public function view_appointment(Request $request, $id){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }

        $appointment = Appointment::select('id', 'title', 'request_date', 'request_time', 'timezone', 'remark', 'location' , 'status', 'created_at')->where(['id' => $id])->first();

        if($appointment){
            $date_time = $this->convertFromUTC($appointment->request_date, $appointment->request_time, $appointment->timezone);
            $appointment->request_date = $date_time[0];
            $appointment->request_time = $date_time[1];            
            $appointment->users        = AppointmentParticipant::where(['appointment_id' => $id, 'type' => 'u'])->pluck('participant_id');
            $appointment->clients      = AppointmentParticipant::where(['appointment_id' => $id, 'type' => 'c'])->pluck('participant_id');
            $appointment->lawyers      = AppointmentParticipant::where(['appointment_id' => $id, 'type' => 'l'])->pluck('participant_id');
            $status = $appointment->status;
            $appointment->status =  $status == 0 ? 'Active' : ( $status == 1 ? 'Completed' : 'Cancelled');
            return api_success_response(API_REQUEST_SUCCESS, ['appointment' => $appointment]);                          

        } else {
            return api_error_response(API_REQUEST_SUCCESS, 'Appointment not found.');            
        } 
    }

    private function _compare_and_update_selection($array1, $array2, $appointment, $type, $user){
        $removed = array_diff($array1,$array2);
        $added = array_diff($array2,$array1);        

        foreach ($removed as $r) {
            AppointmentParticipant::where(['appointment_id' => $appointment, 'type' => $type, 'participant_id' => $r])->delete();
        }

        foreach ($added as $a) {
            $appointmentparticipant = new AppointmentParticipant();
            $appointmentparticipant->appointment_id = $appointment;
            $appointmentparticipant->participant_id = $a;
            $appointmentparticipant->type           = $type;
            $appointmentparticipant->added_by       = $user;
            $appointmentparticipant->save();            
        }        

    }

    public function get_appointment_by_date(Request $request){
        $user = $this->getAuthenticatedUser($request);

        if (is_null($user)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not authorized access. Please login.');
        }
        $type = 'l';
        if($user->user_type == 'C'){
            if($user->is_client == 1){
                $type = 'u';
            } else {
                $type = 'c';
            }
        }

        $page = $request->input('page', 0);
        $limit = $request->input('limit', 10);
        $date = $request->input('date');

        $appointments = Appointment::select('appointments.id', 'title', 'request_date', 'request_time', 'timezone', 'location', 'remark', 'status', 'created_at')
                                    ->join('appointment_participants', 'appointments.id', '=', 'appointment_participants.appointment_id')
                                    ->where('appointment_participants.participant_id', $user->id)
                                    ->where('appointment_participants.type', $type)
                                    ->orderBy('id', 'desc');
        
        if(!is_null($date) && !empty($date)){
            $appointments = $appointments->where('request_date', $date);
        }

        $appointments = $appointments->paginate($limit, $page); 

        foreach ($appointments as $appointment) {
            $date_time = $this->convertFromUTC($appointment->request_date, $appointment->request_time, $appointment->timezone);
            $appointment->request_date = $date_time[0];
            $appointment->request_time = $date_time[1];
            $status = $appointment->status;
            $appointment->status =  $status == 0 ? 'Active' : ( $status == 1 ? 'Completed' : 'Cancelled');
        }

        return api_success_response(API_REQUEST_SUCCESS, ['appointments' => $appointments]);

    }
}
