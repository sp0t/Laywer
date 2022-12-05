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
                <span class="breadcrumb-item active"><a href="/Discussions" class="breadcrumb-item">Discussion </a>/ Add Discussion</span>
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
            
            <h5 class="card-title">Add New Discussion</h5>  
        
          
          
        

        <div class="card-body">
            

            <form class="form-validate-jquery" action="#" novalidate="novalidate">
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold border-bottom"></legend>

                  

                    <!-- Basic text input -->
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Discussion Title<span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" name="basic" class="form-control" required="" placeholder="Enter Title">
                        </div>
                    </div>
                    <!-- /basic text input -->


                    <!-- Basic textarea -->
                    
                    <!-- /basic textarea -->

                </fieldset>

                <fieldset class="mb-3">
                    

                    <!-- Basic select -->


               
                    <div class="form-group row">
						<label class="col-form-label col-lg-3">Add Participant</label>
						<div class="col-lg-9">
                            <div class="form-group">
                                
                                <select class="form-control select-multiple-drag select2-hidden-accessible" multiple="" data-fouc="" data-select2-id="108" tabindex="-1" aria-hidden="true">
                                   
                                    <option value="CO">lawyers</option>
                                    <option value="ID">clients</option>
                                    <option value="WY">customers</option>
                                    <option value="WY">staff</option>
                                </select>
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
            <button type="submit" class="btn btn-primary" style="margin-right: 50px;"> Save  </button></a>
            
        </div>
		
    </div>
    

</div>
                

                
           
<!-- /content area -->
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