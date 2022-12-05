<?php

namespace App\Traits;

use JWTAuth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait APITokenTrait
{
    protected function getAuthenticatedUserType(Request $request)
    {
        $user_type = null;
        $token = $request->header('Authorization');
        if (!$token) {
            return $user_type;
        } 
        
        if ($this->guard()->check()) {
            $user_type = 'C';
        } elseif (Auth::guard('api_user')->check()) {
            $user_type = 'L';
        }

        return $user_type;
    }

    protected function getAuthenticatedUser(Request $request){
        
        $token = $request->header('Authorization');
        if (!$token) {
            return null;
        } 
        
        $user = null;
        if ($this->guard()->check()) {
            $user = $this->guard()->user();
            if (!is_null($user)) {
                $user['user_type'] = 'C';
            }
        } elseif (Auth::guard('api_user')->check()) {
            $user = Auth::guard('api_user')->user();
            if (!is_null($user)) {
                $user['user_type'] = 'L';
            }
        } 

        return $user;      
    }
}