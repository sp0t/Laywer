@extends('layouts.app')
@section('dashname')
<div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
   
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">  <a href="/appointments" class="breadcrumb-item">Appointments</a> / Add Appointments</span>
            </div>

            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                

                <div class="breadcrumb-elements-item dropdown p-0">
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="content">

    <!-- Form validation -->
    <div class="card">
        <div class="card-header">
            
            <h5 class="card-title">Appointment Requests</h5>  
        
          
            <div class="d-flex justify-content-end align-items-center">
				<a href="/appointments">							
                <button type="submit" class="btn btn-primary ml-3">&lt; &lt; Back to calender</button></a>
            </div>
        

        <div class="card-body">
            

            <form class="form-validate-jquery" action="#" novalidate="novalidate">
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold border-bottom"></legend>

                   


                    <!-- Basic text input -->
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Appoiment Title<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" name="basic" class="form-control" required="" placeholder="Text input validation">
                        </div>
                    </div>
                    <!-- /basic text input -->
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Appointment Date</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="date" name="date">
                          
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Appointment Time</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="time" name="time">
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Location<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" name="basic" class="form-control" required="" placeholder="Text input validation">
                        </div>
                    </div>
                                    <div class="form-group row">
										<label class="col-form-label col-lg-2">Invited Parties</label>
										<div class="col-lg-10">
											<input type="text" class="form-control text-right" placeholder="+Optional">
										</div>
									</div>
                                    <div class="form-group row">
										<label class="col-form-label col-lg-2">Remark</label>
										<div class="col-lg-10">
											<textarea rows="3" cols="3" class="form-control" placeholder="Default textarea"></textarea>
										</div>
									</div>
                                    <label class="custom-control custom-radio mb-2">
                                        <input type="radio" class="custom-control-input" name="styled_radio" required="">
                                        <span class="custom-control-label">Approve</span>
                                    </label>
               

                </fieldset>

                <fieldset class="mb-3">
                 
                    

                </fieldset>

                <fieldset class="mb-3">
                    

                 

                </fieldset>

                <fieldset>
                  
                </fieldset>
                
            </form>
        </div>
        <div class="d-flex justify-content-end align-items-center">
            <a href="/">
            <button type="submit" class="btn btn-primary"  style="margin-right: 30px;">Save</button></a>
            <a href="/">
            <button type="submit" class="btn btn-light">Cancel</button></a>
        </div>
    </div>
    

</div>

@endsection
@section('footer')
<div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
    <div class="text-center d-lg-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
            <i class="icon-unfold mr-2"></i>
            Footer
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-footer">
        

        <ul class="navbar-nav ml-lg-auto">
            
            <li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-black"><i class="icon-circle mr-2"></i>by syncbridge</span></a></li>
        </ul>
    </div>
</div>
@endsection