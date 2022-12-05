<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Validator;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'page' => 'required',
        ]);

        if ($validator->fails()) {
            return api_error_response(API_REQUEST_SUCCESS, implode('', $validator->errors()->all()));
        }

        $page = $request->input('page');

        $banners = Banner::
        select("banners.*", "bt.name as banner_type")
            ->leftJoin('banner_types as bt', 'bt.id', '=', 'banners.banner_type_id')
            ->where(['bt.page' => $page, 'banners.channel' => 'MOBILE', 'banners.enabled' => 1])->get();

        return api_success_response(['banners' => $banners]);
    }
}
