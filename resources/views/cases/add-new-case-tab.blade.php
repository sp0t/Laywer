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
<!-- Theme JS files -->
<script src="assets/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script src="assets/global_assets/js/plugins/tables/datatables/extensions/natural_sort.js"></script>

<script src="assets/js/app.js"></script>
<script src="assets/global_assets/js/demo_pages/task_manager_list.js"></script>
<!-- /theme JS files -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Animate CSS for the css animation support if needed -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />


@endsection
@section('dashname')
<div class="page-header page-header-light">
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active"> <a href="/addnewcase" class="breadcrumb-item">Cases</a> / Add New Case</span>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <div class="breadcrumb-elements-item dropdown p-0"> </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <!-- Include SmartWizard CSS -->
    <link href="{{ URL::asset( 'dist/css/demo.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset( 'dist/css/smart_wizard_all.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <br>
    <div class="container">
        <!-- SmartWizard html -->
        <div id="smartwizard" dir="rtl-">
            <ul class="nav nav-progress">
                <li class="nav-item">
                  <a class="nav-link" href="#step-1">
                    <!-- <div class="num">1</div> -->
                     Case Details
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#step-2">
                    <!-- <span class="num">2</span> -->
                        Milestone
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#step-3">
                        <!-- <span class="num">3</span> -->
                        Payments
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#step-4">
                        <!-- <span class="num">4</span> -->
                        Document
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                    <form id="form-1" class="row row-cols-1 ms-5 me-5 needs-validation" novalidate  method="post" action="javascript:void(0)" enctype="multipart/form-data">
                            @csrf
                        {{ csrf_field() }}
                        <fieldset class="mb-3">
                            <legend class="text-uppercase font-size-sm font-weight-bold border-bottom"></legend>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3">Case Type </label>
                                <div class="col-lg-9">
                                    <div class="mb-4" data-select2-id="189">
                                        <select data-placeholder="Enter 'as'" class="form-control select2" id="case_type">
                                            <option data-select2-id="83"> Select case type</option>
                                            @foreach($types as $typeInfo)
                                            <option value="{{ $typeInfo->id }}" data-select2-id="199">{{ $typeInfo->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">
                                            ooks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please select case type
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Basic text input -->
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3">Case Title<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="basic" class="form-control" required="" placeholder="Case Title" name="case_title" id="case_title">
                                    <div class="valid-feedback">
                                        ooks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter case tile
                                    </div>
                                </div>
                            </div>
                            <!-- /basic text input -->


                            <!-- Basic textarea -->
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3">Case description <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <textarea rows="5" cols="5" name="textarea" class="form-control" required="" placeholder=" Please enter case description" id="case_description"></textarea>
                                    <div class="valid-feedback">
                                        ooks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter case description
                                    </div>
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
                                        
                                        <select class="form-control " multiple="" id="lawyers" required>
                                            <option value="">Select lawyers</option>
                                            @foreach($lawyers as $typeInfo)
                                            <option value="{{ $typeInfo->id }}" data-select2-id="199">{{ $typeInfo->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-3">Clients</label>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <select class="form-control select2" multiple=""  id="clients" required>
                                            <option value="">Select Clients</option>
                                             @foreach($clients as $typeInfo)
                                            <option value="{{ $typeInfo->id }}" data-select2-id="199">{{ $typeInfo->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--      <div class="form-group row">
                                <label class="col-form-label col-lg-3"> <span class="text-danger"></span></label>
                                <div class="col-lg-9">
                                    <div class="col-lg-9">
                                        <label class="custom-control custom-switch" style="margin-right: 60px;" >
                                            <input type="checkbox" class="custom-control-input"  name="switch_single" required="" checked>
                                            <span class="custom-control-label">Inactive</span>
                                        </label>
                                    </div> 
                                </div>
                            </div> -->
                            <!-- /basic select -->
                            <div>
                                <button type="submit" class="btn btn-primary sw-btn-next sw-btn" id="submit_data">Submit</button>
                            </div>
                        </fieldset>
                    
                   </form>
                </div>
                <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                    <form id="form-2" class="row row-cols-1 ms-5 me-5 needs-validation" novalidate method="post" action="javascript:void(0)" enctype="multipart/form-data">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td style="width: 20%;">
                                            <div class="d-flex justify-content-end align-items-center">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_default">Add New Milestone <i class="icon-play3 ml-2"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="modal_default" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Milestone Title</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Date</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" type="date" name="date" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Case description <span class="text-danger"></span></label>
                                            <div class="col-lg-10">
                                                <textarea rows="5" cols="5" name="textarea" class="form-control" required="" placeholder="Default textarea"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br />

                        <hr />
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                            <div class="datatable-scroll-lg">
                                <table class="table tasks-list table-lg dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" aria-label="#: activate to sort column ascending" style="width: 20px;">#</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Task Description: activate to sort column ascending" style="width: 40%;">Milestone Title/Description</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Latest update: activate to sort column ascending" style="width: 15%;">Due Date</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 15%;">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Assigned users: activate to sort column ascending" style="width: 15%;">Assigned Lawyers</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Assigned users: activate to sort column ascending" style="width: 15%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-active table-border-double">
                                            <td colspan="8" class="font-weight-semibold">Today</td>
                                        </tr>
                                        <tr class="odd">
                                            <td class="sorting_1">#22</td>

                                            <td>
                                                <div class="font-weight-semibold"><a href="task_manager_detailed.html">Create ad campaign banners set</a></div>
                                                <div class="text-muted">That he had recently cut out of an illustrated magazine..</div>
                                            </td>

                                            <td>
                                                <div class="d-inline-flex align-items-center">
                                                    <i class="icon-calendar2 mr-2"></i>
                                                    22 January, 15
                                                </div>
                                            </td>
                                            <td>
                                                <select name="status" class="custom-select">
                                                    <option value="open">Open</option>
                                                    <option value="hold">On hold</option>
                                                    <option value="resolved" selected="selected">Resolved</option>
                                                    <option value="dublicate">Dublicate</option>
                                                    <option value="invalid">Invalid</option>
                                                    <option value="wontfix">Wontfix</option>
                                                    <option value="closed">Closed</option>
                                                </select>
                                            </td>
                                            <td>
                                                <a href="#"><img src="assets/global_assets/images/demo/users/face5.jpg" class="rounded-circle" width="32" height="32" alt="" /></a>
                                                <a href="#"><img src="assets/global_assets/images/demo/users/face2.jpg" class="rounded-circle" width="32" height="32" alt="" /></a>
                                                <a href="#"><img src="assets/global_assets/images/demo/users/face6.jpg" class="rounded-circle" width="32" height="32" alt="" /></a>
                                            </td>
                                            <td>
                                                <div class="list-icons">
                                                    <a href="#" class="list-icons-item text-teal"><i class="icon-eye"></i></a>
                                                    <a href="#" class="list-icons-item text-primary"><i class="icon-pencil7"></i></a>
                                                    <a href="#" class="list-icons-item text-danger"><i class="icon-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="table-active table-border-double">
                                            <td colspan="8" class="font-weight-semibold">Yesterday</td>
                                        </tr>
                                        <tr class="odd">
                                            <td class="sorting_1">#21</td>

                                            <td>
                                                <div class="font-weight-semibold"><a href="task_manager_detailed.html">Edit the draft for the icons</a></div>
                                                <div class="text-muted">You've got to get enough sleep. Other travelling salesmen..</div>
                                            </td>

                                            <td>
                                                <div class="d-inline-flex align-items-center">
                                                    <i class="icon-calendar2 mr-2"></i>
                                                    21 January, 15
                                                </div>
                                            </td>
                                            <td>
                                                <select name="status" class="custom-select">
                                                    <option value="open">Open</option>
                                                    <option value="hold">On hold</option>
                                                    <option value="resolved">Resolved</option>
                                                    <option value="dublicate">Dublicate</option>
                                                    <option value="invalid" selected="selected">Invalid</option>
                                                    <option value="wontfix">Wontfix</option>
                                                    <option value="closed">Closed</option>
                                                </select>
                                            </td>
                                            <td>
                                                <a href="#"><img src="assets/global_assets/images/demo/users/face18.jpg" class="rounded-circle" width="32" height="32" alt="" /></a>
                                                <a href="#"><img src="assets/global_assets/images/demo/users/face20.jpg" class="rounded-circle" width="32" height="32" alt="" /></a>
                                            </td>
                                            <td>
                                                <div class="list-icons">
                                                    <a href="#" class="list-icons-item text-teal"><i class="icon-eye"></i></a>
                                                    <a href="#" class="list-icons-item text-primary"><i class="icon-pencil7"></i></a>
                                                    <a href="#" class="list-icons-item text-danger"><i class="icon-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br />
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary ml-3 sw-btn-next sw-btn">Save</button>
                        </div>
                    </form>

                </div>
                <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                  <form id="form-3" class="row row-cols-1 ms-5 me-5 needs-validation" novalidate>
                    <div class="col">
                      <label for="address" class="form-label">Address</label>
                      <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                      <div class="invalid-feedback">
                        Please enter your shipping address.
                      </div>
                    </div>
                    <div class="col">
                      <label for="validationCustom04" class="form-label">State</label>
                      <select class="form-select" id="state" required>
                        <option selected disabled value="">Choose...</option>
                        <option>State 1</option>
                        <option>State 2</option>
                        <option>State 3</option>
                      </select>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-feedback">
                        Please select a valid state.
                      </div>
                    </div>
                    <div class="col">
                      <label for="validationCustom05" class="form-label">Zip</label>
                      <input type="text" class="form-control" id="zip" required>
                      <div class="invalid-feedback">
                        Please provide a valid zip.
                      </div>
                    </div>
                  </form>  
                </div>
                <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">

                    <form id="form-4" class="row row-cols-1 ms-5 me-5 needs-validation" novalidate>
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td style="width: 20%;">
                                                <div class="d-flex justify-content-end align-items-center">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_default2">Create Payment <i class="icon-play3 ml-2"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="modal_default2" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Payment By</label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Remark<span class="text-danger"></span></label>
                                                <div class="col-lg-10">
                                                    <textarea rows="5" cols="5" name="textarea" class="form-control" required="" placeholder="Default textarea"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Amount</label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Due Date</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" type="date" name="date" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2">Select Invoice</label>
                                                <div class="col-lg-10">
                                                    <input type="file" class="form-control h-auto" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-lg-2"> <span class="text-danger"></span></label>
                                                <div class="col-lg-9">
                                                    <div class="col-lg-10">
                                                        <label class="custom-control custom-switch" style="margin-right: 60px;">
                                                            <input type="checkbox" class="custom-control-input" name="switch_single" required="" checked />
                                                            <span class="custom-control-label">Partial Paymnets Allow</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                <li class="nav-item">
                                    <a href="#justified-icon-only-tab1" class="nav-link active" data-toggle="tab">
                                        <i>Pending Paymnets</i>
                                        <span class="d-lg-none ml-2">Active</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#justified-icon-only-tab2" class="nav-link" data-toggle="tab">
                                        <i>Completed Payments</i>
                                        <span class="d-lg-none ml-2">Inactive</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="justified-icon-only-tab1">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="card-title">Pending Payments</h6>
                                        </div>

                                        <div class="card-body">
                                            <div class="my-schedule"></div>
                                            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
                                                <div class="datatable-header">
                                                    <div id="DataTables_Table_1_filter" class="dataTables_filter">
                                                        <label><span>Filter:</span> <input type="search" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_1" /></label>
                                                    </div>
                                                    <div class="dataTables_length" id="DataTables_Table_1_length">
                                                        <label>
                                                            <span>Show:</span>
                                                            <select name="DataTables_Table_1_length" aria-controls="DataTables_Table_1" class="custom-select">
                                                                <option value="10">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="100">100</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="datatable-scroll-wrap">
                                                    <table class="table datatable-responsive-column-controlled dataTable no-footer dtr-column" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="control sorting_disabled" rowspan="1" colspan="1" aria-label="" style="display: none;"></th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Case ID</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Client</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Invoice Number</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Job Title: activate to sort column ascending">Full Amount</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of Lawyers: activate to sort column ascending">Paid Amount</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of Lawyers: activate to sort column ascending">Balance</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of clients: activate to sort column ascending">Due Date</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="status: activate to sort column ascending">Invoice</th>
                                                                <th class="text-center sorting_disabled" rowspan="1" colspan="1" style="width: 100px;" aria-label="Actions">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd">
                                                                <td>001</td>
                                                                <td>Cristina</td>

                                                                <td style="">5074.2019</td>
                                                                <td>LKR . 20,000.00</td>
                                                                <td>LKR . 10,000.00</td>
                                                                <td>LKR . 10,000.00</td>
                                                                <td>08/25/2022</td>
                                                                <td><a href="#">Download</a></td>
                                                                <td style="">
                                                                    <div class="list-icons">
                                                                        <a href="#" class="list-icons-item text-teal"><i class="icon-eye"></i></a>
                                                                        <a href="#" class="list-icons-item text-primary"><i class="icon-pencil7"></i></a>
                                                                        <a href="#" class="list-icons-item text-danger"><i class="icon-trash"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datatable-footer">
                                                    <div class="dataTables_info" id="DataTables_Table_1_info" role="status" aria-live="polite">Showing 1 to 10 of 15 entries</div>
                                                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
                                                        <a class="paginate_button previous disabled" aria-controls="DataTables_Table_1" data-dt-idx="0" tabindex="-1" id="DataTables_Table_1_previous">←</a>
                                                        <span>
                                                            <a class="paginate_button current" aria-controls="DataTables_Table_1" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button" aria-controls="DataTables_Table_1" data-dt-idx="2" tabindex="0">2</a>
                                                        </span>
                                                        <a class="paginate_button next" aria-controls="DataTables_Table_1" data-dt-idx="3" tabindex="0" id="DataTables_Table_1_next">→</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="justified-icon-only-tab2">
                                    <div id="div5" class="target">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="card-title">Completed Payments</h6>
                                            </div>

                                            <div class="card-body">
                                                <div class="my-schedule"></div>
                                                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
                                                    <div class="datatable-header">
                                                        <div id="DataTables_Table_1_filter" class="dataTables_filter">
                                                            <label><span>Filter:</span> <input type="search" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_1" /></label>
                                                        </div>
                                                        <div class="dataTables_length" id="DataTables_Table_1_length">
                                                            <label>
                                                                <span>Show:</span>
                                                                <select name="DataTables_Table_1_length" aria-controls="DataTables_Table_1" class="custom-select">
                                                                    <option value="10">10</option>
                                                                    <option value="25">25</option>
                                                                    <option value="50">50</option>
                                                                    <option value="100">100</option>
                                                                </select>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="datatable-scroll-wrap">
                                                        <table class="table datatable-responsive-column-controlled dataTable no-footer dtr-column" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                                                            <thead>
                                                                <tr role="row">
                                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">
                                                                        Payment ID
                                                                    </th>

                                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="date: activate to sort column ascending" style="">Invoive number</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of Lawyers: activate to sort column ascending">Full Amount</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of clients: activate to sort column ascending">Paid By</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="status: activate to sort column ascending">Paid Date</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="status: activate to sort column ascending">Payment Type</th>

                                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="odd">
                                                                    <td class="dtr-control sorting_1" tabindex="0">PAY-001</td>

                                                                    <td style="">5074.2019</td>
                                                                    <td>1505200.00</td>
                                                                    <td>Cristina Galliani</td>
                                                                    <td>2019-12-19</td>
                                                                    <td>online payment</td>

                                                                    <td style="">
                                                                        <div class="list-icons">
                                                                            <a href="#" class="list-icons-item text-teal"><i class="icon-eye"></i></a>
                                                                            <a href="#" class="list-icons-item text-primary"><i class="icon-pencil7"></i></a>
                                                                            <a href="#" class="list-icons-item text-danger"><i class="icon-trash"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="datatable-footer">
                                                        <div class="dataTables_info" id="DataTables_Table_1_info" role="status" aria-live="polite">Showing 1 to 10 of 15 entries</div>
                                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
                                                            <a class="paginate_button previous disabled" aria-controls="DataTables_Table_1" data-dt-idx="0" tabindex="-1" id="DataTables_Table_1_previous">←</a>
                                                            <span>
                                                                <a class="paginate_button current" aria-controls="DataTables_Table_1" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button" aria-controls="DataTables_Table_1" data-dt-idx="2" tabindex="0">2</a>
                                                            </span>
                                                            <a class="paginate_button next" aria-controls="DataTables_Table_1" data-dt-idx="3" tabindex="0" id="DataTables_Table_1_next">→</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>


        <br /> &nbsp;
    </div>

    <!-- Confirm Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Order Placed</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Congratulations! Your order is placed.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="closeModal()">Ok, close and reset</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootrap for the demo page -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- jQuery Slim 3.6  -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script> -->

    <!-- Include SmartWizard JavaScript source -->
    <script type="text/javascript" src="{{ URL::asset( 'dist/js/jquery.smartWizard.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset( 'dist/js/demo.js') }}"></script>
    <script src="{{ URL::asset( 'assets/js/select2.min.js') }}" type="text/javascript"></script>
       
<script type="text/javascript">

        $('#submit_data').on('click',function(e){
            e.preventDefault();
            var case_type          = $('#case_type').val();
            var case_title         = $('#case_title').val();
            var case_description   = $('#case_description').val();
            var lawyers   = $('#lawyers').val();
            var clients   = $('#clients').val();
      
            $.ajax({
                data: {
                    type : case_type,
                    title : case_title,
                    description : case_description,
                    lawyers : lawyers,
                    clients : clients,
                    _token: $("input[name='_token']").val() ,
                },
                type: "POST",
                dataType:'JSON',
                url: window.baseUrl + '/cases/add',
                success:function(data) {
                    
                   
                 }
            }); 
        });

        const myModal = new bootstrap.Modal(document.getElementById('confirmModal'));


        function onCancel() { 
          // Reset wizard
          $('#smartwizard').smartWizard("reset");

          // Reset form
          document.getElementById("form-1").reset();
          document.getElementById("form-2").reset();
          document.getElementById("form-3").reset();
          document.getElementById("form-4").reset();
        }

        function onConfirm() {
          let form = document.getElementById('form-4');
          if (form) {
            if (!form.checkValidity()) {
              form.classList.add('was-validated');
              $('#smartwizard').smartWizard("setState", [3], 'error');
              $("#smartwizard").smartWizard('fixHeight');
              return false;
            }
            
            $('#smartwizard').smartWizard("unsetState", [3], 'error');
            myModal.show();
          }
        }

        function closeModal() {
          // Reset wizard
          $('#smartwizard').smartWizard("reset");

          // Reset form
          document.getElementById("form-1").reset();
          document.getElementById("form-2").reset();
          document.getElementById("form-3").reset();
          document.getElementById("form-4").reset();

          myModal.hide();
        }

        function showConfirm() {
          const name = $('#first-name').val() + ' ' + $('#last-name').val();
          const products = $('#sel-products').val();
          const shipping = $('#address').val() + ' ' + $('#state').val() + ' ' + $('#zip').val();
          let html = `
                  <div class="row">
                    <div class="col">
                      <h4 class="mb-3-">Customer Details</h4>
                      <hr class="my-2">
                      <div class="row g-3 align-items-center">
                        <div class="col-auto">
                          <label class="col-form-label">Name</label>
                        </div>
                        <div class="col-auto">
                          <span class="form-text-">${name}</span>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <h4 class="mt-3-">Shipping</h4>
                      <hr class="my-2">
                      <div class="row g-3 align-items-center">
                        <div class="col-auto">
                          <span class="form-text-">${shipping}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  
        
                  <h4 class="mt-3">Products</h4>
                  <hr class="my-2">
                  <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <span class="form-text-">${products}</span>
                    </div>
                  </div>

                  `;
          $("#order-details").html(html);
          $('#smartwizard').smartWizard("fixHeight"); 
        }

        $(function() {
            // Leave step event is used for validating the forms
            $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIdx, nextStepIdx, stepDirection) {
                // Validate only on forward movement  
                if (stepDirection == 'forward') {
                  let form = document.getElementById('form-' + (currentStepIdx + 1));
                  if (form) {
                    if (!form.checkValidity()) {
                      form.classList.add('was-validated');
                      $('#smartwizard').smartWizard("setState", [currentStepIdx], 'error');
                      $("#smartwizard").smartWizard('fixHeight');
                      return false;
                    }
                    $('#smartwizard').smartWizard("unsetState", [currentStepIdx], 'error');
                  }
                }
            });

            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepIndex, stepDirection, stepPosition) {
                $("#prev-btn").removeClass('disabled').prop('disabled', false);
                $("#next-btn").removeClass('disabled').prop('disabled', false);
                if(stepPosition === 'first') {
                    $("#prev-btn").addClass('disabled').prop('disabled', true);
                } else if(stepPosition === 'last') {
                    $("#next-btn").addClass('disabled').prop('disabled', true);
                } else {
                    $("#prev-btn").removeClass('disabled').prop('disabled', false);
                    $("#next-btn").removeClass('disabled').prop('disabled', false);
                }

                // Get step info from Smart Wizard
                let stepInfo = $('#smartwizard').smartWizard("getStepInfo");
                $("#sw-current-step").text(stepInfo.currentStep + 1);
                $("#sw-total-step").text(stepInfo.totalSteps);

                if (stepPosition == 'last') {
                  showConfirm();
                  $("#btnFinish").prop('disabled', false);
                } else {
                  $("#btnFinish").prop('disabled', true);
                }

                // Focus first name
                if (stepIndex == 1) {
                  setTimeout(() => {
                    $('#first-name').focus();
                  }, 0);
                }
            });

            // Smart Wizard
            $('#smartwizard').smartWizard({
                selected: 0,
                // autoAdjustHeight: false,
                theme: 'arrows', // basic, arrows, square, round, dots
                transition: {
                  animation:'none'
                },
                toolbar: {
                  showNextButton: false, // show/hide a Next button
                  showPreviousButton: false, // show/hide a Previous button
                  position: 'bottom'
                },
                anchor: {
                    enableNavigation: true, // Enable/Disable anchor navigation 
                    enableNavigationAlways: false, // Activates all anchors clickable always
                    enableDoneState: true, // Add done state on visited steps
                    markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                    unDoneOnBackNavigation: true, // While navigate back, done state will be cleared
                    enableDoneStateNavigation: true // Enable/Disable the done state navigation
                },
            });

            $("#state_selector").on("change", function() {
                $('#smartwizard').smartWizard("setState", [$('#step_to_style').val()], $(this).val(), !$('#is_reset').prop("checked"));
                return true;
            });

            $("#style_selector").on("change", function() {
                $('#smartwizard').smartWizard("setStyle", [$('#step_to_style').val()], $(this).val(), !$('#is_reset').prop("checked"));
                return true;
            });

        });
    </script>
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