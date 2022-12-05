<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/auth/register', 'Auth\AuthController@register')->name('api.register');
Route::post('/auth/registration_verify', 'Auth\AuthController@verify_registration')->name('api.registration_verify');
Route::post('/auth/send_otp', 'Auth\AuthController@otp_send')->name('api.send_otp');
Route::post('/auth/login', 'Auth\AuthController@auth')->name('api.login');
Route::post('/auth/refresh', 'Auth\AuthController@refresh')->name('api.refresh');

Route::post('/password/request_reset', 'Auth\AuthController@password_reset_request')->name('api.request_reset');
Route::post('/password/rest', 'Auth\AuthController@password_reset')->name('api.password_reset');

Route::post('/contactus/msg', 'ContactController@store')->name('api.contactus');
Route::get('/contact_info', 'SiteController@get_contact_data')->name('api.contact_info');

Route::get('/banners', 'BannerController@index')->name('api.banners');

Route::get('/cases', 'CaseController@index')->name('api.cases');
Route::get('/cases/favorite', 'CaseController@favorite_handler')->name('api.cases_favorite');

Route::get('/profile', 'ProfileController@get_profile_data')->name('api.profile');
Route::post('/profile/update', 'ProfileController@update_profile_data')->name('api.update_data');
Route::post('/profile/password', 'ProfileController@set_password')->name('api.password');

Route::get('/blogs', 'BlogController@index')->name('api.blogs');
Route::get('/blogs/{id}', 'BlogController@view')->name('api.blogs_view')->where('id', '[0-9]+');

Route::post('/discussion/create', 'DiscussionController@create_discussion')->name('api.discussion.create');
Route::get('/discussion/{id}/edit', 'DiscussionController@get_discussion')->name('api.discussion.edit')->where('id', '[0-9]+');
Route::post('/discussion/{id}/edit', 'DiscussionController@update_discussion')->name('api.discussion.update')->where('id', '[0-9]+');
Route::delete('/discussion/{id}/delete', 'DiscussionController@delete_discussion')->name('api.discussion.delete')->where('id', '[0-9]+');
Route::get('/discussions', 'DiscussionController@list_discussion_requested')->name('api.discussion.list');
Route::post('/discussions/{id}/message/send', 'DiscussionController@send_message')->name('api.discussion.send_message')->where('id', '[0-9]+');
Route::delete('/discussion/{id}/message/{mid}/delete', 'DiscussionController@unsend_message')->name('api.discussion.unsend_message')->where('id', '[0-9]+')->where('mid', '[0-9]+');
Route::get('/discussion/{id}/message/{mid}/read_unread', 'DiscussionController@read_unread_message')->name('api.discussion.read_unread_message')->where('id', '[0-9]+')->where('mid', '[0-9]+');
Route::get('/discussion/{id}/messages', 'DiscussionController@get_discussion_messages')->name('api.discussion.discussion_messages')->where('id', '[0-9]+')->where('mid', '[0-9]+');
Route::post('/discussion/{id}/update', 'DiscussionController@update_discussion_status')->name('api.discussion.update_status')->where('id', '[0-9]+');


Route::post('/appointment/request', 'AppointmentRequestController@request_appointment')->name('api.appointment.request');
Route::get('/appointment/request', 'AppointmentRequestController@get_appointment_requests')->name('api.appointment.request.list');
Route::get('/appointment/{id}/request/edit', 'AppointmentRequestController@get_request_edit')->name('api.appointment.request.edit')->where('id', '[0-9]+');
Route::post('/appointment/{id}/request/edit', 'AppointmentRequestController@update_request_by_customer')->name('api.appointment.request.update')->where('id', '[0-9]+');
Route::delete('/appointment/{id}/request/delete', 'AppointmentRequestController@delete_request')->name('api.appointment.request.delete')->where('id', '[0-9]+');
Route::get('/appointment/{id}/request/reject', 'AppointmentRequestController@reject_appointment_request')->name('api.appointment.request.reject')->where('id', '[0-9]+');
Route::post('/appointment/{id}/request/convert', 'AppointmentRequestController@convert_request_appointment')->name('api.appointment.request.convert')->where('id', '[0-9]+');

Route::post('/appointment/create', 'AppointmentController@create_discussion')->name('api.appointment.create');
Route::get('/appointment/created_list', 'AppointmentController@get_appointments')->name('api.appointment.list');
Route::delete('/appointment/{id}/delete', 'AppointmentController@delete_appointment')->name('api.appointment.delete')->where('id', '[0-9]+');
Route::get('/appointment/{id}/edit', 'AppointmentController@get_appointment')->name('api.appointment.edit')->where('id', '[0-9]+');
Route::post('/appointment/{id}/edit', 'AppointmentController@update_appointment')->name('api.appointment.update')->where('id', '[0-9]+');
Route::get('/appointment/{id}/view', 'AppointmentController@view_appointment')->name('api.appointment.view')->where('id', '[0-9]+');

Route::get('/appointment/me', 'AppointmentController@get_appointment_by_date')->name('api.appointment.me');

Route::get('/common/timezones', 'CommonController@get_timezone_list')->name('api.common.timezone');
Route::get('/common/users', 'CommonController@get_users')->name('api.common.users');
Route::get('/common/clients', 'CommonController@get_clients')->name('api.common.clients');
Route::get('/common/lawyers', 'CommonController@get_lawyers')->name('api.common.lawyers');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
