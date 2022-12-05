@extends('layouts.app')
@section('dashname')
<div class="page-header page-header-light">
   

    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active"><a href="/banners" class="breadcrumb-item">Mobile Banners  </a>/ Update Banner</span>
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
                    <h5 class="card-title">Update Banner</h5>
                </div>

                <div class="card-body">
                    <form action="#">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Enter Title">
                        </div>

                        

                        

                        <div class="form-group">
                            <label>Description:</label>
                            <textarea rows="5" cols="5" class="form-control" placeholder="Enter your description here"></textarea>
                        </div>
                        <div class="form-group">
                            
                            <label class="custom-file">
                                <input type="file" class="custom-file-input">
                                <span class="custom-file-label">Upload Banner</span>
                            </label>
                            <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                        </div>
                        
                        <div class="form-group">
                            

                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" name="gender" >
                                <span class="custom-control-label">Enable</span>
                            </label>

                           
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <a href="/banners">
                            <button type="submit" class="btn btn-primary" style="margin-right: 50px;"> Update  </button></a>
                            
                        </div>
                        

                        

                        
                    </form>
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
