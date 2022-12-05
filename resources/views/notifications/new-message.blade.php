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
                <span class="breadcrumb-item active"><a href="/notifications" class="breadcrumb-item">Notifications </a>/ New Messages</span>
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

    <!-- Vertical form options -->
    

            <!-- Basic layout-->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Send New Message</h5>
                </div>

                <div class="card-body">
                    <form action="#">
                        <div class="form-group">
                            <label>Title</label>
                            <div class="col-lg-12">
                            <input type="text" class="form-control" placeholder="Eugene Kopyov"></div>
                        </div>

                        

                        <div class="form-group ">
                            <label >Notification Type</label>
                            <div class="col-lg-12">
                                <select class="form-control">
                                    <option value="opt1">Default select box</option>
                                    <option value="opt2">SMS</option>
                                    <option value="opt3">Option 3</option>
                                    <option value="opt4">Option 4</option>
                                    <option value="opt5">Option 5</option>
                                    <option value="opt6">Option 6</option>
                                    <option value="opt7">Option 7</option>
                                    <option value="opt8">Option 8</option>
                                </select>
                            </div>
                        </div>
                            
                        

                        

                        <div class="form-group">
                            <label>Your message:</label>
                            <textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
                        </div>
                        <div class="form-group">
                            
                            <label class="custom-file">
                                <input type="file" class="custom-file-input">
                                <span class="custom-file-label">Choose file</span>
                            </label>
                            <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                        </div>
                        
                        <div class="form-group">
                            <label class="d-block">Notification Audience:</label>

                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="gender" >
                                <span class="custom-control-label">All</span>
                            </label>

                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="gender">
                                <span class="custom-control-label">Customers</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="gender">
                                <span class="custom-control-label">Clients</span>
                            </label>
                            <a class="single" target="1" >
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="gender">
                                <span class="custom-control-label">Selected Audience</span>
                            </label>
                            </a>
                        </div>
                        <section class="target_box">
                            
                            <div id="div1" class="target">
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">lawyers</label>
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            
                                            <select class="form-control select-multiple-drag select2-hidden-accessible" multiple="" data-fouc="" data-select2-id="108" tabindex="-1" aria-hidden="true">
                                               
                                                <option value="CO">wasana</option>
                                                <option value="ID">ranu</option>
                                                <option value="WY">john</option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end align-items-center">
                                    <a href="#">							
                                    <button type="submit" class="btn btn-primary ml-3">Lunch</button></a>
                                </div>
                                    </div>
                                    <div id="div2" class="target">
                                       
                                            </div>
                        
                        </section>

                        

                        
                    </form>
                    <script type="text/javascript">
                    document.getElementById("div1").style.display = "none";
                
                        jQuery(function(){
                            jQuery('.target').click(function(){
                                jQuery('.target').hide();
                                
                            });
                            jQuery('.single').click(function(){
                                jQuery('.target').hide();
                                jQuery('#div'+$(this).attr('target')).show();
                            });	
                        });
                </script>
                </div>
            </div>
            <!-- /basic layout -->

      

        <div class="col-lg-6">

            <!-- Static mode -->
            
            

        </div>
  
    <!-- /vertical form options -->


    <!-- Centered forms -->
    
    <!-- /form centered -->


    <!-- Fieldset legend -->
    
    <!-- /fieldset legend -->


    <!-- 2 columns form -->
    
    <!-- /2 columns form -->

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
