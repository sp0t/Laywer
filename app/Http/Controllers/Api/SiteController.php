<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SiteController extends Controller
{
    public function get_contact_data(Request $request){
        $setting = Setting::where('s_group', 'CONTACT')->pluck('value', 'skey')->toArray();

        return api_success_response(API_REQUEST_SUCCESS, [$setting]);           
    }
}
