<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Camroncade\Timezone\Facades\Timezone;
use App\Models\Customer;
use App\Models\User;

class CommonController extends Controller
{
    protected function guard()
    {
        return Auth::guard('api');
    }  

    public function get_timezone_list(){
        $timezones = Timezone::getTimezones();
        $timezones = array_flip($timezones);
        
        return api_success_response(API_REQUEST_SUCCESS, ['timezones' => $timezones]);
    }

    public function get_users(){
        $users = Customer::select('id', 'name')->where(['verified' => 1, 'is_client' => 0, 'inactive' => 0])->get();
        return api_success_response(API_REQUEST_SUCCESS, ['users' => $users]);
    }

    public function get_clients(){
        $clients = Customer::select('id', 'name')->where(['verified' => 1, 'is_client' => 1, 'inactive' => 0])->get();
        return api_success_response(API_REQUEST_SUCCESS, ['clients' => $clients]);
    }

    public function get_lawyers(){
        $lawyers = User::select('id', 'name')->where(['status'=> 1, 'user_type' => 1])->get();
        return api_success_response(API_REQUEST_SUCCESS, ['lawyers' => $lawyers]);
    }
}
