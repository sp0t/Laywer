@extends('layouts.app')
@section('dashname')
<div class="page-header page-header-light">
    

    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active"> Discussions</span>
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

    <!-- Basic tabs title -->
    
    <!-- /basic tabs title -->


    <!-- Basic tabs -->
    
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Discussions</h6>
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="/adddiscussions"> 								
                        <button type="submit" class="btn btn-primary ml-3">Add New Discussion</button></a> 
                    </div>
                </div>

                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a href="#basic-tab1" class="nav-link " data-toggle="tab">Ongoing Discussions</a></li>
                        <li class="nav-item"><a href="#basic-tab2" class="nav-link active" data-toggle="tab">Discussion Request</a></li>
                        
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade " id="basic-tab1">
                        <div class="card">
    <div class="card-header">
        <h6 class="card-title">Ongoing Discussions</h6>
    </div>

    <div class="card-body">
        <div class="my-schedule"></div>
<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer"><div class="datatable-header"><div id="DataTables_Table_1_filter" class="dataTables_filter"><label><span>Filter:</span> <input type="search" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_1"></label></div><div class="dataTables_length" id="DataTables_Table_1_length"><label><span>Show:</span> <select name="DataTables_Table_1_length" aria-controls="DataTables_Table_1" class="custom-select"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="datatable-scroll-wrap"><table class="table datatable-responsive-column-controlled dataTable no-footer dtr-column" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row">
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">Initiated Date & Time</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Reaquested By</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="date: activate to sort column ascending" style="">Title</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of Lawyers: activate to sort column ascending">Iniated By</th>
   
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="">Action</th>
                </tr>
            </thead>
            <tbody>
            
                <tr class="odd">
                    <td class="dtr-control sorting_1" tabindex="0">07/06/2022 08:09:12</td>
                    <td>john</td>
                    
                    <td style="">Undefined</td>
                    
                    <td>Cristina Galliani</td>
                   
                    <td style=""><div class="list-icons">
                        
                        <i class="fas fa-trash-alt" title="View Message"><a href="/Dismessages" class="list-icons-item text-primary"><i class="icon-comment "></i></a></i>
                        <i class="fas fa-trash-alt" title="edit"><a href="#" class="list-icons-item text-teal"><i class="icon-pencil7"></i></a></i>
                        <i class="fas fa-trash-alt" title="delete"><a href="#" class="list-icons-item text-danger"><i class="icon-trash"></i></a></i>
                       
                    </div></td>
                    
                </tr></tbody>
        </table></div><div class="datatable-footer"><div class="dataTables_info" id="DataTables_Table_1_info" role="status" aria-live="polite">Showing 1 to 10 of 15 entries</div><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate"><a class="paginate_button previous disabled" aria-controls="DataTables_Table_1" data-dt-idx="0" tabindex="-1" id="DataTables_Table_1_previous">←</a><span><a class="paginate_button current" aria-controls="DataTables_Table_1" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="DataTables_Table_1" data-dt-idx="2" tabindex="0">2</a></span><a class="paginate_button next" aria-controls="DataTables_Table_1" data-dt-idx="3" tabindex="0" id="DataTables_Table_1_next">→</a></div></div></div>
    </div>
</div>
                        </div>

                        <div class="tab-pane fade active show " id="basic-tab2">
                            <div class="card">
    <div class="card-header">
        <h6 class="card-title">Discussion Request</h6>
       
    </div>

    <div class="card-body">
        <div class="my-schedule"></div>
<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer"><div class="datatable-header"><div id="DataTables_Table_1_filter" class="dataTables_filter"><label><span>Filter:</span> <input type="search" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_1"></label></div><div class="dataTables_length" id="DataTables_Table_1_length"><label><span>Show:</span> <select name="DataTables_Table_1_length" aria-controls="DataTables_Table_1" class="custom-select"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="datatable-scroll-wrap"><table class="table datatable-responsive-column-controlled dataTable no-footer dtr-column" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row">
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">Initiated Date & Time</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Title</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="date: activate to sort column ascending" style="">Initiated By</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of Lawyers: activate to sort column ascending">Last Reply Date&Time</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of clients: activate to sort column ascending">Reply By</th>
 
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="">Action</th>
                </tr>
            </thead>
            <tbody>
            
                <tr class="odd">
                    <td class="dtr-control sorting_1" tabindex="0">07/06/2022 08:09:12</td>
                    <td>undefined</td>
                    
                    
                    <td>Cristina Galliani</td>
                    <td>2019-12-19 07:08:49</td>
                    <td>john</td>
                    
                    <td style=""><div class="list-icons">
                        <i class="fas fa-trash-alt" title="View"><a href="#" class="list-icons-item text-primary"><i class="icon-eye"></i></a></i>
                        <i class="fas fa-trash-alt" title="edit"><a href="#" class="list-icons-item text-teal"><i class="icon-pencil7"></i></a></i>
                        <i class="fas fa-trash-alt" title="delete"><a href="#" class="list-icons-item text-danger"><i class="icon-trash"></i></a></i>
                       
                       
                    </div></td>
                    
                </tr></tbody>
        </table></div><div class="datatable-footer"><div class="dataTables_info" id="DataTables_Table_1_info" role="status" aria-live="polite">Showing 1 to 10 of 15 entries</div><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate"><a class="paginate_button previous disabled" aria-controls="DataTables_Table_1" data-dt-idx="0" tabindex="-1" id="DataTables_Table_1_previous">←</a><span><a class="paginate_button current" aria-controls="DataTables_Table_1" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="DataTables_Table_1" data-dt-idx="2" tabindex="0">2</a></span><a class="paginate_button next" aria-controls="DataTables_Table_1" data-dt-idx="3" tabindex="0" id="DataTables_Table_1_next">→</a></div></div></div>
    </div>
</div>
                        </div>

                        

                        
                    </div>
                </div>
            </div>
        </div>

        
   
    <!-- /basic tabs -->


    <!-- Rounded basic tabs -->
    
    <!-- /rounded basic tabs -->


    <!-- Highlighted tabs -->
    
    <!-- /highlighted tabs -->



    <!-- Tabs with top line -->
    

    
    <!-- /tabs with top line -->



    <!-- Tabs with bottom line -->
    

    
    <!-- /tabs with bottom line -->



    <!-- Vertical tabs -->
    

    
    <!-- /vertical tabs -->



    <!-- Solid tabs title -->
    
    <!-- /solid tabs title -->


    <!-- Solid tabs -->
    
    <!-- /solid tabs -->


    <!-- Solid bordered tabs -->
    
    <!-- /solid bordered tabs -->


    <!-- Rounded solid tabs -->
    
    <!-- /rounded solid tabs -->


    <!-- Rounded solid bordered tabs -->
    
    <!-- /rounded solid bordered tabs -->


    <!-- Colored tabs -->
    
    <!-- /colored tabs -->


    <!-- Rounded colored tabs -->
    
    <!-- /rounded colored tabs -->



    <!-- Tab options title -->
    
    <!-- /tab options title -->


    <!-- Tabs position -->
    
    <!-- /tabs position -->


    <!-- Bordered tab content -->
    
    <!-- /bordered tab content -->



    <!-- Tab icons -->
    
    <!-- /tab icons title -->


    <!-- Left icons -->
    
    <!-- /left icons -->


    <!-- Right icons -->
    
    <!-- /right icons -->


    <!-- Top icons -->
    
    <!-- /top icons -->


    <!-- Icons only -->
    
    <!-- /icons only -->



    <!-- Tab badges title -->
    
    <!-- /tab badges title -->


    <!-- Badges -->
    
    <!-- /badges -->


    <!-- Pill badges -->
    
    <!-- /badges -->





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
