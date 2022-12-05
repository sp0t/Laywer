@extends('layouts.app')
@section('css')
<!-- Core JS files -->
<script src="assets/global_assets/js/main/jquery.min.js"></script>
<script src="assets/global_assets/js/main/bootstrap.bundle.min.js"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script src="assets/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js"></script>
<script src="assets/global_assets/js/plugins/forms/selects/select2.min.js"></script>

<script src="assets/js/app.js"></script>
<script src="assets/global_assets/js/demo_pages/form_select2.js"></script>
<!-- /theme JS files -->
@endsection

@section('dashname')

<div class="page-header page-header-light">
   

    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">  <a href="/cases" class="breadcrumb-item"> Cases </a> / Add New Case</span>
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
					
<!-- Content area -->
<div class="content">
   

    <!-- Form validation -->
    <div class="card">
        <div class="card-header">
            
            <h5 class="card-title">Add New Case</h5>  
        
          
            <div class="d-flex justify-content-end align-items-center">
				<a href="/cases">							
                <button type="submit" class="btn btn-primary ml-3"><i class="icon-arrow" ></i>
                     Back To Case List</button></a>
            </div>
        

        <div class="card-body">
            

            <form class="form-validate-jquery" action="#" novalidate="novalidate">
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold border-bottom"></legend>

                  
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Case Type </label>
                        <div class="col-lg-9">
                            <div class="mb-4" data-select2-id="189">
						
                                <select data-placeholder="Enter 'as'" class="form-control select-minimum select2-hidden-accessible" data-fouc="" data-select2-id="81" tabindex="-1" aria-hidden="true">
                                    <option data-select2-id="83"></option>
                                    <optgroup label="Mountain Time Zone" data-select2-id="198">
                                        <option value="AZ" data-select2-id="199">Arizona</option>
                                        <option value="CO" data-select2-id="200">Colorado</option>
                                        <option value="ID" data-select2-id="201">Idaho</option>
                                        <option value="WY" data-select2-id="202">Wyoming</option>
                                    </optgroup>
                                    <optgroup label="Central Time Zone" data-select2-id="203">
                                        <option value="AL" data-select2-id="204">Alabama</option>
                                        <option value="IA" data-select2-id="205">Iowa</option>
                                        <option value="KS" data-select2-id="206">Kansas</option>
                                        <option value="KY" data-select2-id="207">Kentucky</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    



                    <!-- Basic text input -->
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Case Title<span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" name="basic" class="form-control" required="" placeholder="Enter Title">
                        </div>
                    </div>
                    <!-- /basic text input -->


                    <!-- Basic textarea -->
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Case description <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <textarea rows="5" cols="5" name="textarea" class="form-control" required="" placeholder="Enter Description"></textarea>
                        </div>
                    </div>
                    <!-- /basic textarea -->

                </fieldset>

                <fieldset class="mb-3">
                    

                    <!-- Basic select -->
                    

                     <div class="form-group row">
						<label class="col-form-label col-lg-3">Lawyers</label>
						<div class="col-lg-9">
                            <div class="form-group">
                                
                                <select class="form-control select-multiple-drag select2-hidden-accessible" multiple="" data-fouc="" data-select2-id="108" tabindex="-1" aria-hidden="true">
                                   
                                    <option value="CO">wasana</option>
                                    <option value="ID">ranu</option>
                                    <option value="WY">john</option>
                                   
                                </select>
                            </div>
						</div>
					</div>



                    <div class="form-group row">
						<label class="col-form-label col-lg-3">Clients</label>
						<div class="col-lg-9">
                            <div class="form-group">
                                
                                <select class="form-control select-multiple-drag select2-hidden-accessible" multiple="" data-fouc="" data-select2-id="108" tabindex="-1" aria-hidden="true">
                                    <option value="CO">wasana</option>
                                    <option value="ID">ranu</option>
                                    <option value="WY">john</option>
                                </select>
                            </div>
						</div>
					</div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3"> <span class="text-danger"></span></label>
                        <div class="col-lg-9">
                            <div class="col-lg-9">
                                <label class="custom-control custom-switch" style="margin-right: 60px;" >
                                    <input type="checkbox" class="custom-control-input"  name="switch_single" required="" checked>
                                    <span class="custom-control-label">Active</span>
                                </label>
                            </div> 
                        </div>
                    </div>


                    
					
                    <!-- /basic select -->


                    

                </fieldset>

                <fieldset class="mb-3">
                    

                 

                </fieldset>

                <fieldset>
                    

                    <!-- Switch single -->
					
                    <!-- /switch single -->


                    
                </fieldset>
                
            </form>
        </div>
        <div class="d-flex justify-content-end align-items-center">
            <a href="/addnewcasetab">
            <button type="submit" class="btn btn-primary" style="margin-right: 30px;"> Save  </button></a>
            <a href="/addnewcase">
            <button type="submit" class="btn btn-light">Cancel</button></a>
        </div>
		
    </div>
    

</div>
                

                
           
<!-- /content area -->
				</div>
				<!-- /content area -->

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
				
