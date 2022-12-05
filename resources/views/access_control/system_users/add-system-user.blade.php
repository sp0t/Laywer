@extends('layouts.app')
@section('dashname')
<div class="page-header page-header-light">
   

    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active"> <a href="/systemusers" class="breadcrumb-item">Access Control </a>/ System User / Add New  User</span>
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
            
            <h5 class="card-title">Add New System User</h5>  
        
          
            <div class="d-flex justify-content-end align-items-center">
				<a href="/systemusers">							
                <button type="submit" class="btn btn-primary ml-3">&lt; &lt; Back to System User</button></a>
            </div>
        
        </div>

        <div class="card-body">
            <form action="#">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Full name</label>
                            <input type="text" class="form-control font-weight-light" placeholder="Enter Full Name">
                        </div>
                        
                       
              
    
                
                        <div class="col-lg-6">
                            <label>Address</label>
                            <input type="text" class="form-control font-weight-light" placeholder="Enter Address">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Email</label>
                            <input type="email" readonly="readonly" class="form-control font-weight-light" placeholder="Enter Email">
                        </div>
                        
                
            
                
                        <div class="col-lg-6">
                            <label>Code</label>
                            <input type="text" class="form-control font-weight-light" placeholder="Enter Code">
                           
                        </div>
                    </div>
                </div>
                        
                
                <div class="form-group">
                    <div class="row">       
                        <div class="col-lg-6">
                            <label>password</label>
                            <input type="password" class="form-control font-weight-light" placeholder="Enter Password">
                        </div>
                        <div class="col-lg-6">
                            <label>Confirm password</label>
                            <input type="password" class="form-control font-weight-light" placeholder="Enter Password">
                        </div>
                        
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Contact</label>
                            <input type="text" class="form-control font-weight-light" placeholder="Enter  Contact Number">
                         
                        </div>        
                        <div class="col-lg-6">
                            <label>Rolle<span class="text-danger">*</span></label>
                            <div>
                                <select name="default_select" class="form-control" required="">
                                    <option value="">Choose an option</option> 
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Admin</option>
                                        <option value="HI">India</option>
                                        <option value="CA">California</option>
                                    </optgroup>
                                    
                                </select>
                            </div>
                        </div>
                        
                    </div>
                </div>
                  
    
                
                 <br>
    
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
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