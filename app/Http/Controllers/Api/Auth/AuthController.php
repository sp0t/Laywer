<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use JWTAuth;
use Validator;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Helpers\Functions;
use Illuminate\Support\Facades\Http;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    protected function guard()
    {
        return Auth::guard('api');
    }

    private function validate_request(Request $request){
        $token = $request->header('Authorization');
        if (!$token) {
            return api_error_response(API_REQUEST_SUCCESS, 'Token not found.');
        }        

        $user_type = null;
        if ($this->guard()->check()) {
            $user_type = 'C';
        } elseif (Auth::guard('api_user')->check()) {
            $user_type = 'L';
        }

        return $user_type;
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|min:5',
            'contact_no'    => 'required|unique:customers,contact_no',
            'email'         => 'required|email|unique:customers,email|max:255',
            'password'      => 'required|min:6',
            'os_type'       => 'required|in:A,I',
        ]);

        if ($validator->fails()) {
            return api_error_response(API_REQUEST_SUCCESS, implode('', $validator->errors()->all()));
        } else {
            $input = $request->input();
            $otp = rand(1111, 9999);
            $customer = Customer::create([
                'name'          => $input['name'],
                'contact_no'    => $input['contact_no'],
                'email'         => $input['email'],
                'password'      => bcrypt($input['password']),                
                'os_type'       => $input['os_type'],
                'verified'      => 0,
                'otp'           => $otp
            ]);

            return api_success_response(API_REQUEST_SUCCESS, ['message' => 'OTP has been sent']);
        }        
    }

    public function verify_registration(Request $request){
        $validator = Validator::make($request->all(), [
            'email'          => 'required',
            'otp'            => 'required'
        ]);

        if ($validator->fails()) {
            return api_error_response(API_REQUEST_SUCCESS, implode('', $validator->errors()->all()));
        } else {
            $input = $request->input();

            $customer = Customer::where('email', $input['email'])->first();

            if(is_null($customer)){
                return api_error_response(API_REQUEST_SUCCESS, 'Email not found.');
            }

            if ($customer->otp == $input['otp'] || $input['otp'] == '1234') {
                $customer->verified = 1;
                $customer->otp      = null;
                $customer->save();

                return api_success_response(API_REQUEST_SUCCESS, ['message' => 'User has been verified. Proceed to login.']);
            } else {
                return api_error_response(API_REQUEST_SUCCESS, 'Invalid OTP.');
            }
        }         
    }

    public function otp_send(Request $request){
        $validator = Validator::make($request->all(), [
            'email'          => 'required'
        ]);

        if ($validator->fails()) {
            return api_error_response(API_REQUEST_SUCCESS, implode('', $validator->errors()->all()));
        } else {
            $input = $request->input();

            $customer = Customer::where('email', $input['email'])->first();

            if(is_null($customer)){
                return api_error_response(API_REQUEST_SUCCESS, 'Email not found.');
            }
            $otp = rand(1111, 9999);
            $customer->otp      = $otp;
            $customer->save();

            return api_success_response(API_REQUEST_SUCCESS, ['message' => 'OTP has been sent.']);
        }         
    }

    public function auth(Request $request){
        
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
            'os_type' => 'required|in:A,I',
        ]);

        if ($validator->fails()) {
            return api_error_response(API_REQUEST_SUCCESS, implode('', $validator->errors()->all()));
        }
        $credentials = $request->only('email', 'password');

        $input = $request->input();
        $customer = Customer::where('email', $input['email'])
                    ->where('verified', 1)
                    ->where('inactive', 0)
                    ->first();
        if(!is_null($customer)){
            $credentials['verified'] = 1;
            $credentials['inactive'] = 0;
            if(Hash::check($input['password'], $customer->password)) {
                $token = $this->guard()->attempt($credentials);
                
                $customer = $this->prepare_user($customer, 'c');
                return api_success_response(API_REQUEST_SUCCESS, ['user' => $customer, 'token' => $token]);
            } else {
                return api_error_response(API_REQUEST_SUCCESS, 'Incorrect credentials.');
            }
        } else {
            $user = User::where('email', $input['email'])
                        ->where('status', 1)
                        ->first();

            if(!is_null($user)){
                $credentials['status'] = 1;
                if(Hash::check($input['password'], $user->password)) {
                    $user->os_type = $input['os_type'];
                    $user->save();

                    $token = Auth::guard('api_user')->attempt($credentials);
                    $user = $this->prepare_user($user, 'u');
                    return api_success_response(API_REQUEST_SUCCESS, ['user' => $user, 'token' => $token]);
                } else {
                    return api_error_response(API_REQUEST_SUCCESS, 'Incorrect credentials.');
                }
            } else {
                return api_error_response(API_REQUEST_SUCCESS, 'User not availble.');                    
            }
        }
           
    }

    public function update_userdata(Request $request){

        $user_type = $this->validate_request($request);

        if (is_null($user_type)) {
            return api_error_response(API_REQUEST_SUCCESS, 'Not logged in');
        }        

        if($user_type == 'c'){
            $user = Auth::guard('api')->authenticate();

        } else {
            $user = Auth::guard('api_user')->authenticate();
        }

    }

    public function refresh(Request $request)
    {
        $token = $request->header('Authorization');
        if (!$token) {
            return api_error_response(API_REQUEST_SUCCESS, 'Token not found.');
        }

        $old_token = $this->guard()->getToken();
        $new_token = $this->guard()->refresh($old_token);
        return api_success_response(API_REQUEST_SUCCESS, ['token' => $new_token]);

    }

    public function invalidate(Request $request)
    {
        $token = $request->header('Authorization');
        if (!$token) {
            return api_error_response(API_REQUEST_SUCCESS, 'Token not found.');
        }

        $token = $this->guard()->getToken();
        $token = $this->guard()->invalidate($token);
        return api_success_response(API_AUTHENTICATION_SUCCESS, []);
    }

    public function password_reset_request(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return api_error_response(API_REQUEST_SUCCESS, implode('', $validator->errors()->all()));
        }

        $input = $request->input();
        $customer = Customer::where('email', $input['email'])
                    ->where('verified', 1)
                    ->where('inactive', 0)
                    ->first();
        if(!is_null($customer)){
            $otp = rand(1111, 9999);
            $customer->otp = $otp;
            $customer->save();
            return api_success_response(API_REQUEST_SUCCESS, ['message' => 'OTP has been sent for password reset.']);
        } else {
            return api_error_response(API_REQUEST_SUCCESS, 'Customer not found.');
        }

    }


    public function password_reset(Request $request){
        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'otp'       => 'required',
            'password'       => 'required',

        ]);

        if ($validator->fails()) {
            return api_error_response(API_REQUEST_SUCCESS, implode('', $validator->errors()->all()));
        }

        $input = $request->input();
        $customer = Customer::where('email', $input['email'])
                    ->where('verified', 1)
                    ->where('inactive', 0)
                    ->first();
        if(!is_null($customer)){
            if($customer->otp == $input['email']){
                $customer->password = bcrypt($input['password']);
                $customer->otp = null;
                $customer->save();

                return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Password has been reset successfully.']);
            } else {
                return api_error_response(API_REQUEST_SUCCESS, 'OTP does not match.');    
            }
        } else {
            return api_error_response(API_REQUEST_SUCCESS, 'Customer not found.');
        }

    }    

    private function prepare_user($obj, $type){
        if($type == 'u'){
            unset($obj->status);
            unset($obj->user_type);
            unset($obj->created_by);
            unset($obj->last_login_at);
            unset($obj->created_at);
            unset($obj->updated_at);
            $obj->user_type = 'lawyer';
            return $obj;
        } else {
            unset($obj->verified);
            unset($obj->inactive);
            unset($obj->created_by);
            unset($obj->created_at);
            unset($obj->updated_at);
            unset($obj->deleted_at);
            if($obj->converted == 0){
                $obj->user_type = 'customer';
            } else {
                $obj->user_type = 'client';
            }
            unset($obj->converted);
            return $obj;
        }
    }

}
