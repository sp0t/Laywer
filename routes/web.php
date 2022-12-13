<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'Auth\LoginController@getLogin');
Route::get('/login', 'Auth\LoginController@getLogin');


Route::get('/auth/login', 'Auth\LoginController@getLogin')->name('login.get');
Route::post('/auth/login', 'Auth\LoginController@postLogin')->name('login.post');
Route::get('/auth/logout', 'Auth\LoginController@getLogout')->name('login.logout');

Route::middleware(['auth:web'])->group(function () {
    Route::get('/', 'HomeController@index')->name('dashboard.index');

    Route::get('/customers', 'CustomerController@index')->name('customer.index');
    Route::get('/customers/load_ajax', 'CustomerController@load_ajax')->name('customer.load_ajax');
    Route::get('/customers/add', 'CustomerController@create')->name('customer.create');
    Route::post('/customers/add', 'CustomerController@store')->name('customer.store');
    Route::get('/customers/{id}/edit', 'CustomerController@edit')->name('customer.edit')->where('id', '[0-9]+');
    Route::patch('/customers/{id}/edit', 'CustomerController@update')->name('customer.update')->where('id', '[0-9]+');
    Route::get('/customers/{id}/view', 'CustomerController@view')->name('customer.view')->where('id', '[0-9]+');

    Route::get('/lawyers', 'LawyerController@index')->name('lawyer.index');
    Route::get('/lawyers/load_ajax', 'LawyerController@load_ajax')->name('lawyer.load_ajax');   
    Route::get('/lawyers/add', 'LawyerController@create')->name('lawyer.create'); 
    Route::post('/lawyers/add', 'LawyerController@store')->name('lawyer.store');
    Route::get('/lawyers/{id}/edit', 'LawyerController@edit')->name('lawyer.edit')->where('id', '[0-9]+');
    Route::patch('/lawyers/{id}/edit', 'LawyerController@update')->name('lawyer.update')->where('id', '[0-9]+');    
    Route::get('/lawyers/{id}/view', 'LawyerController@view')->name('lawyer.view')->where('id', '[0-9]+');

    Route::get('/clients', 'ClientController@index')->name('client.index');
    Route::get('/clients/load_ajax', 'ClientController@load_ajax')->name('client.load_ajax');       
    Route::get('/clients/add', 'ClientController@create')->name('client.create');
    Route::post('/clients/add', 'ClientController@store')->name('client.store');
    Route::get('/clients/{id}/edit', 'ClientController@edit')->name('client.edit')->where('id', '[0-9]+');
    Route::patch('/clients/{id}/edit', 'ClientController@update')->name('client.update')->where('id', '[0-9]+');
    Route::get('/clients/{id}/view', 'ClientController@view')->name('client.view')->where('id', '[0-9]+');

    Route::get('/cases', 'CaseController@index')->name('case.index');
    Route::get('/cases/load_ajax', 'CaseController@load_ajax')->name('case.load_ajax'); 
    Route::get('/cases/add', 'CaseController@create')->name('case.create');
    Route::post('/cases/add', 'CaseController@store')->name('case.store');

    Route::resource('cases/type', 'CaseTypeController');
    Route::post('/cases/type', 'CaseTypeController@store')->name('case_type.store');
    Route::post('/case/payment', 'CaseController@payment')->name('case.payment');
    Route::get('/case/type/{id}/edit', 'CaseTypeController@editInfo')->name('case_type.edit')->where('id', '[0-9]+');
    Route::get('/cases_type/load_ajax', 'CaseTypeController@load_ajax')->name('cases_type.load_ajax'); 

    Route::get('/cases/{id}/edit', 'CaseController@edit')->name('case.edit')->where('id', '[0-9]+');
    Route::patch('/cases/{id}/edit', 'CaseController@update')->name('case.update')->where('id', '[0-9]+');
    // Route::get('/clients/{id}/view', 'ClientController@view')->name('client.view')->where('id', '[0-9]+');    
    // 

    Route::get('/cases/{id}/milestones/add', 'CaseController@milestone_popup')->name('case.milestones.add')->where('id', '[0-9]+');
    Route::get('/cases/{id}/milestones/{milestone}', 'CaseController@milestone_popup')->name('case.milestones.edit')->where('id', '[0-9]+')->where('milestone', '[0-9]+');
    Route::get('/cases/{id}/milestones/{milestone}/view', 'CaseController@milestone_popup_view')->name('case.milestones.view')->where('id', '[0-9]+')->where('milestone', '[0-9]+');
    Route::post('/cases/{id}/milestones/add', 'CaseController@milestone_save')->name('case.milestones.save')->where('id', '[0-9]+');
    Route::post('/cases/{id}/milestones/{milestone}', 'CaseController@milestone_save')->name('case.milestones.update')->where('id', '[0-9]+');
    Route::get('/cases/load_ajax_milestone', 'CaseController@load_ajax_milestone')->name('case.milestone'); 
    Route::post('/cases/{id}/milestones/{milestone}/status', 'CaseController@update_milestone_status')->name('case.milestones.status-update')->where('id', '[0-9]+');

    Route::get('/blog', 'BlogController@index')->name('blog.index');
    Route::get('/blog/load_ajax', 'BlogController@load_ajax')->name('blog.load_ajax');   
    Route::get('/blog/add', 'BlogController@create')->name('blog.create'); 
    Route::post('/blog/add', 'BlogController@store')->name('blog.store');
    Route::get('/blog/{id}/view', 'BlogController@view')->name('blog.view')->where('id', '[0-9]+');
    Route::get('/blog/{id}/edit', 'BlogController@edit')->name('blog.edit')->where('id', '[0-9]+');
    Route::patch('/blog/{id}/edit', 'BlogController@update')->name('blog.update')->where('id', '[0-9]+');    

    Route::get('/milestone', 'MilestoneController@index')->name('milestone.index');
    Route::get('/milestones/load_ajax', 'MilestoneController@load_ajax')->name('milestone.load_ajax'); 
    Route::get('/milestones/add', 'MilestoneController@create')->name('milestone.create');
    Route::post('/milestone', 'MilestoneController@store')->name('milestone.store');
    Route::post('/milestone/update/{id}', 'MilestoneController@update')->name('milestone.update');


    //Banners - 2022/10/25
    Route::get('/banners', 'BannerController@index')->name('mpl.admin.banners.index');
    Route::get('/banners/load_ajax', 'BannerController@load_ajax')->name('mpl.admin.banners.load_ajax');   
    Route::get('/banners/create', 'BannerController@create')->name('mpl.admin.banners.create'); 
    Route::post('/banners/create', 'BannerController@store')->name('mpl.admin.banners.store');
    Route::get('/banners/{id}/edit', 'BannerController@edit')->name('mpl.admin.banners.edit')->where('id', '[0-9]+');
    Route::patch('/banners/{id}/edit', 'BannerController@update')->name('mpl.admin.banners.update')->where('id', '[0-9]+');    
    Route::get('/banners/{id}/view', 'BannerController@view')->name('mpl.admin.banners.view')->where('id', '[0-9]+');
    Route::get('dropzone', 'DropzoneController@dropzone');
    Route::post('dropzone/store', 'DropzoneController@dropzoneStore')->name('dropzone.store');
    Route::post('case/documents/delete', 'DropzoneController@caseDocumentDelete')->name('dropzone.delete');
    Route::post('case/milestone/delete', 'DropzoneController@caseMilestoneDelete')->name('milestone.delete');
    Route::post('case/payment/delete', 'DropzoneController@casePaymentDelete')->name('payment.delete');
    Route::post('casefinal/submit', 'CaseController@caseFinalSubmit')->name('case_type.submit');
});



Route::get('/homedd',function(){
    return view('layouts.auth2');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//appoinmets
Route::get('/appointments',function(){
    return view('appointments.appointments');
});
Route::get('/addnewappointments',function(){
    return view('appointments.add-appointments');
});
Route::get('/appointmentrequests',function(){
    return view('appointments.appointment-request');
});
Route::get('/editappointmentrequests',function(){
    return view('appointments.edit-appintmnet-request');
});


//pendig peymnets
Route::get('/pendingPaymnets',function(){
    return view('pendingPaymnets');
});


//recent payment
Route::get('/recentPaymnets',function(){
    return view('recentPaymnets');
});


//recent customer
Route::get('/recentCustomers',function(){
    return view('recentCustomers');
});


//cases
Route::get('/addnewcase',function(){
    return view('cases.add-new-case');
});
Route::get('/addnewcasetab',function(){
    return view('cases.add-new-case-tab');
});
Route::get('/dashboard',function(){
    return view('cases.dashboard');
});
// Route::get('/cases',function(){
//     return view('cases.index');
// });


//client
// Route::get('/client',function(){
//     return view('clients.clients');
// });
// Route::get('/addclient',function(){
//     return view('clients.add-client');
// });
// Route::get('/editclient',function(){
//     return view('clients.edit-client');
// });


//customer
// Route::get('/customers',function(){
//     return view('customers.index');
// });
Route::get('/addcustomers',function(){
    return view('customers.add-customer');
});
Route::get('/editcustomers',function(){
    return view('customers.edit-customer');
});

//style="max-width : 17%"
//lawyers
Route::get('/Lawyers',function(){
    return view('Lawyers.Lawyer');
});
Route::get('/addLawyers',function(){
    return view('Lawyers.add-Lawyer');
});
Route::get('/editLawyers',function(){
    return view('Lawyers.edit-Lawyer');
});


//access control
//system users
Route::get('/systemusers',function(){
    return view('access_control.system_users.system-users');
});
Route::get('/addsystemusers',function(){
    return view('access_control.system_users.add-system-user');
});

//access rights

Route::get('/accessrights',function(){
    return view('access_control.access_rights.access-rights');
});
Route::get('/addaccessrights',function(){
    return view('access_control.access_rights.add-access-rights');
});


//audit
Route::get('/audit',function(){
    return view('audit.audit');
});

//profile
Route::get('/profile',function(){
    return view('profile.profile');
});

//discussions
Route::get('/Discussions',function(){
    return view('discussions.discussions');
});
Route::get('/Dismessages',function(){
    return view('discussions.messages');
});
Route::get('/adddiscussions',function(){
    return view('discussions.add-discussion');
});

//notification
Route::get('/notifications',function(){
    return view('notifications.notifications');
});
Route::get('/newmessage',function(){
    return view('notifications.new-message');
});

// //blog
// Route::get('/blog',function(){
//     return view('blog.blog');
// });


//master data
//banner
// Route::get('/banners',function(){
//     return view('master_data.banners.banners');
// });
// Route::get('/newbanners',function(){
//     return view('master_data.banners.new-banners');
// });
// Route::get('/updatebanners',function(){
//     return view('master_data.banners.update-banners');
// });

//file
Route::get('/filecategory',function(){
    return view('master_data.file_categories.file-categories');
});
Route::get('/newfilecategory',function(){
    return view('master_data.file_categories.new-file-categories');
});
Route::get('/updatefilecategory',function(){
    return view('master_data.file_categories.update-file-categories');
});


//contact us
Route::get('/contactus',function(){
    return view('contact_us.contact-us');
});
Route::get('/newcontactus',function(){
    return view('contact_us.new-contact-us');
});

//content
Route::get('/content',function(){
    return view('layouts.app');
    // return view('content.content');
});
Route::get('/newcontent',function(){
    return view('content.new-content');
});
Route::get('/updatecontent',function(){
    return view('content.update-content');
});
