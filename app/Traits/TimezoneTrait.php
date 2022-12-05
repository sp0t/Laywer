<?php

namespace App\Traits;

use JWTAuth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Camroncade\Timezone\Facades\Timezone;

trait TimezoneTrait
{
    protected function convertToUTC($date, $time, $timezone)
    {
        $converted_time = Timezone::convertToUTC($date.' '.$time, $timezone, 'Y-m-d H:i:s');
        $exploded = explode(' ', $converted_time);

        return $exploded;
    }

    protected function convertFromUTC($date, $time, $timezone){
        
        $converted_time = Timezone::convertFromUTC($date.' '.$time, $timezone, 'Y-m-d H:i:s');
        $exploded = explode(' ', $converted_time);

        return $exploded;
    }
}