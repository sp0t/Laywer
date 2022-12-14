@extends('layouts.app')
@section('dashname')
<div class="page-header page-header-light">
   

    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Audit</span>
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

					
					

<!-- Basic responsive configuration -->
<div class="card">
    <div class="row-fluid">
    <div class="card-header" >
       
        <h5 class="card-title">Audit Details</h5>  
       
        
      
        
    
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"><div class="datatable-header">
    <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><span>Filter:</span>
         <input type="search" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_0"></label>
        </div><div class="dataTables_length" id="DataTables_Table_0_length"><label>
            <span>Show:</span> <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="datatable-scroll-wrap"><table class="table datatable-responsive dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
	<thead>
		<tr role="row">
			<th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">Mobile</th>
			<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"> Username</th>
			<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"> Date&Time</th>
	
			
			</tr>
	</thead>
	<tbody>
		
		
	<tr class="odd">
			<td class="dtr-control sorting_1" tabindex="0">Case/Payment</td>
			<td>John villiam</td>
			<td>2019/03/06 07:04:32</td>
			
			
			
		</tr>
        <tr class="odd">
			<td class="dtr-control sorting_1" tabindex="0">Case/Add</td>
			<td>John</td>
			<td>2019/03/06 07:04:32</td>
			
			
		</tr>
        
       
        
       
		</tbody>
</table></div><div class="datatable-footer"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 15 entries</div><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><a class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="-1" id="DataTables_Table_0_previous">???</a><span><a class="paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0">2</a></span><a class="paginate_button next" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" id="DataTables_Table_0_next">???</a></div></div></div>
</div></div>

<!-- /basic responsive configuration -->

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
				