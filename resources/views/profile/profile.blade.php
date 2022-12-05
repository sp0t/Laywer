@extends('cases.dashboard')
@section('dashname')
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-lg-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> -Profile</h4>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="d-flex justify-content-center">
                
            </div>
        </div>
    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Profile</span>
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

    <!-- Inner container -->
    <div class="d-lg-flex align-items-lg-start">

        <!-- Left sidebar component -->
        <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left wmin-300 border-0 shadow-none sidebar-expand-lg">

            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- Navigation -->
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-img-actions d-inline-block mb-3">
                            <img class="img-fluid rounded-circle" src="assets/global_assets/images/demo/users/face11.jpg" width="170" height="170" alt="">
                            <div class="card-img-actions-overlay rounded-circle">
                                <a href="#" class="btn btn-outline-white border-2 btn-icon rounded-pill">
                                    <i class="icon-plus3"></i>
                                </a>
                                <a href="user_pages_profile.html" class="btn btn-outline-white border-2 btn-icon rounded-pill ml-2">
                                    <i class="icon-link"></i>
                                </a>
                            </div>
                        </div>

                        <h6 class="font-weight-semibold mb-0">Victoria Davidson</h6>
                        <span class="d-block opacity-75">Head of UX</span>
                    </div>

                    <ul class="nav nav-sidebar">
                        <li class="nav-item">
                            <a href="#profile" class="nav-link active" data-toggle="tab">
                                <i class="icon-user"></i>
                                 My profile
                            </a>
                        </li>
                       
                        
                        
                        
                    </ul>
                </div>
                <!-- /navigation -->


                <!-- Online users -->
                
                <!-- /online users -->


                <!-- Latest connections -->
                
                <!-- /latest connections -->

            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /left sidebar component -->


        <!-- Right content -->
        <div class="tab-content flex-1">
            <div class="tab-pane fade active show" id="profile">

                <!-- Sales stats -->
                
                <!-- /sales stats -->


                <!-- Profile info -->
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Profile information</h6>
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
                                        <label>Contact Official</label>
                                        <input type="text" class="form-control font-weight-light" placeholder="Enter Official Contact Number">
                                       
                                    </div>
                                    
                                </div>
                            </div>
                
                        
                            <div class="form-group">
                                <div class="row">
                                    
                                    <div class="col-lg-6">
                                        <label>password</label>
                                        <input type="password" class="form-control font-weight-light" placeholder="Enter Password">
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
                <!-- /profile info -->


                <!-- Account settings -->
                
                <!-- /account settings -->

            </div>

            <div class="tab-pane fade" id="schedule">

                <!-- Available hours -->
               
                <!-- /available hours -->


                <!-- Schedule -->
              
                <!-- /schedule -->

            </div>

          

            
        </div>
        <!-- /right content -->

    </div>
    <!-- /inner container -->

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