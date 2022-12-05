<?php

define("API_REQUEST_SUCCESS", 200);
define("API_UNAUTHORIZED", 401);
define("API_REQUEST_FAILED", 500);


define("COUNTRY_ID_LK", 196);

function convert_datetime_to_carbon($value, $from = 'Y-m-d H:i:s', $to = 'd/m/Y H:i')
{
    if (empty($value)) {
        return null;
    }
    $carbon_date = \Carbon\Carbon::parse($value);
    if ($carbon_date->timestamp <= 0) {
        return null;
    } else {
        return $carbon_date->format($to);
    }
}

if (!function_exists('carbon_format_date')) {
    function carbon_format_date($value, $from = 'd/m/Y', $to = 'Y-m-d')
    {
        if (empty($value)) {
            return null;
        }
        return \Carbon\Carbon::createFromFormat($from, $value)->format($to);
    }
}

if (!function_exists('enum_get')) {
    function enum_get($type)
    {
        return config('enums.' . $type);
    }
}

if (!function_exists('enum_find')) {
    function enum_find($key, $type)
    {
        $enum_arr = config('enums.' . $type);
        return isset($enum_arr[$key]) ? $enum_arr[$key] : null;
    }
}
function get_page_title($page_title)
{
    return ($page_title) ? $page_title . ' | ' . CSHelper::setting('site_title') : CSHelper::setting('site_title');
}

function api_success_response($code, $data = [])
{
    $message = "";
    if (isset($data['message'])) {
        $message = $data['message'];
        unset($data['message']);
    }

    if(empty($data)){
        $data = new stdClass();
    }

    $body = ['status' => true, 'message' => $message, 'data' => $data];
    // $body = ['status' => true, 'code' => $code, 'data' => $data, 'message' => $message];
    return response()->json($body);
}


function api_error_response($code, $message, $extra = [])
{
    // , 'code' => $code
    $body = ['status' => false, 'message' => $message];
    if ($extra) {
        $body['extra'] = $extra;
    }
    return response()->json($body);
}

function generate_promo_code($size = 10){
    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $res = null;
    for ($i = 0; $i < $size; $i++) {
        $res .= $chars[mt_rand(0, strlen($chars)-1)];
    }
    return $res;
}

function removeComma($number){
    return str_replace(',', '', $number);
}

function detect_browser(){
    $agent = $_SERVER["HTTP_USER_AGENT"] ?? 'Unknown';

    if( preg_match('/MSIE (\d+\.\d+);/', $agent) ) {
        return "IE";
    } else if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $agent) ) {
        return "CHROME";
    } else if (preg_match('/Edge\/\d+/', $agent) ) {
        return "EDGE";
    } else if ( preg_match('/Firefox[\/\s](\d+\.\d+)/', $agent) ) {
        return "FF";
    } else if ( preg_match('/OPR[\/\s](\d+\.\d+)/', $agent) ) {
        return "OPERA";
    } else if (preg_match('/Safari[\/\s](\d+\.\d+)/', $agent) ) {
        return "SAFARI";
    } else{
        return "UNKNOWN";
    }
}

function variant_size_groups($variants){
    $groups = array();
    if(count($variants) > 0){
        foreach ($variants as $v) {
            $key = $v['v_option2'];
            if (!isset($groups[$key])) {
                $groups[$key] = array(
                    'option' => $key,
                    'qty' => $v['v_qty'],
                );
            } else {
                $groups[$key]['qty'] += $v['v_qty'];
            }
        }
    }

    return $groups;
}


function resolve_audit_old_value($entity, $field, $old_value){

    switch([$entity, $field]){
        case ["Order", "order_status"]:
            $order_statuses = get_order_statuses();
            $refined_value = $order_statuses[$old_value] ?? '';
            break;
        case ["Order", "payment_status"]:
            $payment_statuses = get_payment_statuses();
            $refined_value = $payment_statuses[$old_value] ?? '';
            break;
        default:
            $refined_value = $old_value ?? '-';
    }

    return $refined_value;
}

function resolve_audit_new_value($entity, $field, $old_value){

    switch([$entity, $field]){
        case ["Order", "order_status"]:
            $order_statuses = get_order_statuses();
            $refined_value = $order_statuses[$old_value] ?? '';
            break;
        case ["Order", "payment_status"]:
            $payment_statuses = get_payment_statuses();
            $refined_value = $payment_statuses[$old_value] ?? '';
            break;
        default:
            $refined_value = $old_value ?? '-';
    }

    return $refined_value;
}

function get_order_statuses(){
    return [
        ORDER_STATUS_NEW => CSHelper::order_status_label(ORDER_STATUS_NEW),
        ORDER_STATUS_ACKNOWLEDGED => CSHelper::order_status_label(ORDER_STATUS_ACKNOWLEDGED),
        ORDER_STATUS_PROCESSING => CSHelper::order_status_label(ORDER_STATUS_PROCESSING),
        ORDER_STATUS_ON_HOLD => CSHelper::order_status_label(ORDER_STATUS_ON_HOLD),
        ORDER_STATUS_SHIPPED => CSHelper::order_status_label(ORDER_STATUS_SHIPPED),
        ORDER_STATUS_COMPLETE => CSHelper::order_status_label(ORDER_STATUS_COMPLETE),
        ORDER_STATUS_CANCELLED => CSHelper::order_status_label(ORDER_STATUS_CANCELLED),
        ORDER_STATUS_RETURNED => CSHelper::order_status_label(ORDER_STATUS_RETURNED),
    ];
}

function get_payment_statuses(){
    return [
        PAYMENT_STATUS_PENDING => CSHelper::payment_status_label(PAYMENT_STATUS_PENDING),
        PAYMENT_STATUS_AUTHORIZED => CSHelper::payment_status_label(PAYMENT_STATUS_AUTHORIZED),
        PAYMENT_STATUS_PAID => CSHelper::payment_status_label(PAYMENT_STATUS_PAID),
        PAYMENT_STATUS_PARTIALLY_PAID => CSHelper::payment_status_label(PAYMENT_STATUS_PARTIALLY_PAID),
        PAYMENT_STATUS_REFUNDED => CSHelper::payment_status_label(PAYMENT_STATUS_REFUNDED),
        PAYMENT_STATUS_PARTIALLY_REFUNDED => CSHelper::payment_status_label(PAYMENT_STATUS_PARTIALLY_REFUNDED),
    ];
}

function array_group_by($key, $array) {
    $result = array();

    foreach($array as $val) {
        if(array_key_exists($key, $val)){
            $result[$val[$key]][] = $val;
        }else{
            $result[""][] = $val;
        }
    }

    return $result;
}

function pretty_array($array){
    return array_map('_pretty_word', $array);
}

function _pretty_word($string){
    return ucwords(strtolower(str_replace('_', ' ', $string)));
}

function _case_status(){
    return [
        0 => 'Pending',
        1 => 'Ongoing',
        2 => 'Hold',
        3 => 'Closed',
        4 => 'Completed',
    ];
}

function _case_milestone_status(){
    return [
        0 => 'Open',
        1 => 'On hold',
        2 => 'Resolved',
        3 => 'Dublicate',
        4 => 'Invalid',
        5 => 'Wont fix',
        6 => 'Closed',
    ];
}