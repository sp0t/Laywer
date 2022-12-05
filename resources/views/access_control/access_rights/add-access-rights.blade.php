@extends('layouts.app')
@section('dashname')
<div class="page-header page-header-light">
    

    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active"> <a href="/accessrights" class="breadcrumb-item">Access control </a> / Access Rights</span>
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
            
            <h5 class="card-title">Add New Case</h5>  
        
          
            <div class="d-flex justify-content-end align-items-center">
				<a href="/accessrights">							
                <button type="submit" class="btn btn-primary ml-3">&lt; &lt; Back to case list</button></a>
            </div>
        

        <div class="card-body">
            

            <form class="form-validate-jquery" action="#" novalidate="novalidate">
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold border-bottom"></legend>

                 
                    <!-- Basic text input -->
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Name<span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" name="basic" class="form-control" required="" placeholder="Enter Title">
                        </div>
                    </div>
                    <!-- /basic text input -->


                    <!-- Basic textarea -->
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Description <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <textarea rows="5" cols="5" name="textarea" class="form-control" required="" placeholder="Enter Description"></textarea>
                        </div>
                    </div>
                    <!-- /basic textarea -->

               
                    <div class="card">
						<div class="card-header">
							<h5 class="card-title">Bordered striped</h5>
						</div>

						

						<div class="table-responsive">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										
										<th>Node</th>
										<th>view</th>
										<th>Add/Edit</th>
                                        <th>Delete</th>
    
									</tr>
								</thead>
								<tbody>
									<tr>
										
										<td><div class="col-lg-9">
											<div class="form-check">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input" name="single_basic_checkbox" required="">
													Cases Modules
												</label>
											</div>
										</div></td>
										<td><div class="col-lg-9">
											<div class="form-check">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input" name="single_basic_checkbox" required="">
													.
												</label>
											</div>
										</div></td>
										<td><div class="col-lg-9">
											<div class="form-check">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input" name="single_basic_checkbox" required="">
													.
												</label>
											</div>
										</div></td>
                                        <td><div class="col-lg-9">
											<div class="form-check">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input" name="single_basic_checkbox" required="">
													.
												</label>
											</div>
										</div></td>
									</tr>
									
									
									
								</tbody>
							</table>
						</div>
					</div>
               

           
                
            </form>
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
				