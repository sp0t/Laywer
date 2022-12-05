<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactusMessage;
use Validator;

class ContactController extends Controller
{
    protected function guard()
    {
        return Auth::guard('api');
    }

    public  function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|min:5',
            'email'         => 'required|email',
            'message'      => 'required'
        ]);

        if ($validator->fails()) {
            return api_error_response(API_REQUEST_SUCCESS, implode('', $validator->errors()->all()));
        } else {
            $input = $request->input();
            
            $contactus = new ContactusMessage();
            $contactus->name = $input['name'];
            $contactus->email = $input['email'];
            $contactus->message = $input['message'];
            $contactus->save();

            return api_success_response(API_REQUEST_SUCCESS, ['message' => 'Request added successfully.']);
        }  
    }
}
