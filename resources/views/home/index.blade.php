@extends('layouts.app')

@section('breadcrumb')
	<span class="breadcrumb-item active">Dashboard</span>
@endsection

@section('content')
					<!-- /dashboard content -->
<!-- Content area -->
<div class="content">

    <!-- Simple statistics -->
   


   

    
<div class="menu">
	

    <div class="row">

        <div class="col-sm-6 col-xl-4"  >
			<a class="single" target="1" >

            <div class="card card-body bg-primary text-white has-bg-image">
                <div class="media" >
                    <div class="media-body">
                        <h3 class="mb-0">{{ $cases->count() }}</h3>
                        <span class="text-uppercase font-size-xs">Ongoing Cases</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-copy icon-3x opacity-75"></i>
                    </div>
                </div>
            </div></a>
        </div>		
        <div class="col-sm-6 col-xl-4">
			<a class="single" target="2">
            <div class="card card-body bg-danger text-white has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0">38</h3>
                        <span class="text-uppercase font-size-xs">Appointments</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-calendar icon-3x opacity-75"></i>
                    </div>
                </div>
            </div></a>
        </div>

		
        <div class="col-sm-6 col-xl-4">
			<a class="single" target="3">
            <div class="card card-body bg-success text-white has-bg-image">
                <div class="media">
                    

                    <div class="media-body">
                        <h3 class="mb-0">19</h3>
                        <span class="text-uppercase font-size-xs"> Discussions</span>
                    </div>
					<div class="mr-3 align-self-center">
                        <i class="icon-bubbles4 icon-3x opacity-75"></i>
                    </div>
                </div>
            </div></a>
        </div>
        <div class="col-sm-6 col-xl-4">
			<a class="single" target="4">
            <div class="card card-body bg-indigo text-white has-bg-image">
                <div class="media">
                    <div class="mr-3 align-self-center">
                        <i class="icon-credit-card icon-3x opacity-75"></i>
                    </div>

                    <div class="media-body text-right">
                        <h3 class="mb-0">22</h3>
                        <span class="text-uppercase font-size-xs">Pending Paymnets</span>
                    </div>
                </div>
            </div></a>
        </div>

		
        <div class="col-sm-6 col-xl-4">
			<a class="single" target="5">
            <div class="card card-body bg-warning text-white has-bg-image">
                <div class="media">
                    <div class="mr-3 align-self-center">
                        <i class="icon-enter6 icon-3x opacity-75"></i>
                    </div>

                    <div class="media-body text-right">
                        <h3 class="mb-0">24</h3>
                        <span class="text-uppercase font-size-xs">Recent Paymnets</span>
                    </div>
                </div>
            </div></a>
        </div>

		
        <div class="col-sm-6 col-xl-4">
			<a class="single" target="6">
            <div class="card card-body bg-secondary text-white has-bg-image">
                <div class="media">
                    <div class="mr-3 align-self-center">
                        <i class="icon-user icon-3x opacity-75"></i>
                    </div>

                    <div class="media-body text-right">
                        <h3 class="mb-0">26</h3>
                        <span class="text-uppercase font-size-xs">Recent Users</span>
                    </div>
                </div>
            </div></a>
        </div>
    </div>
    <!-- /simple statistics -->

  

   
    <!-- /other chart types -->
<!-- Basic responsive configuration -->
<section class="target_box">
<div id="div1" class="target">
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Ongoing Cases</h5>
    </div>
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"><div class="datatable-header"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label><span>Filter:</span> <input type="search" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_0"></label></div><div class="dataTables_length" id="DataTables_Table_0_length"><label><span>Show:</span> <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="datatable-scroll-wrap"><table class="table datatable-responsive dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
	<thead>
		<tr role="row">
			<th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">Case ID</th>
			<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Case Name</th>
			<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="date: activate to sort column ascending" style="">Case Date</th>
			<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of Lawyers: activate to sort column ascending" >Number of Lawyers</th>
			<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of clients: activate to sort column ascending" >Number of Clients</th>
			<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="status: activate to sort column ascending" >Status</th>
			<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="">Action</th>
			</tr>
	</thead>
	<tbody>
		
		
	<tr class="odd">
			<td class="dtr-control sorting_1" tabindex="0">0001</td>
			<td>LBBcorn snack</td>
			
			<td style="">18/08/22</td>
			<td>3</td>
			<td>2</td>
			<td><span class="badge badge-danger">Ongoing</span></td>
			<td style=""> <a href="/cases" class="list-icons-item text-teal"><i class="icon-eye"></i></a></td>
			
		</tr>
		<tr class="odd">
			<td class="dtr-control sorting_1" tabindex="0">0002</td>
			<td>KSB vs BOC</td>
			
			<td style="">18/08/22</td>
			<td>2</td>
			<td>2</td>
			<td><span class="badge badge-danger">Ongoing</span></td>
			<td style=""> <a href="/cases" class="list-icons-item text-teal"><i class="icon-eye"></i></a></td>
			
		</tr>
        <tr class="odd">
			<td class="dtr-control sorting_1" tabindex="0">0003</td>
			<td>KSB vs UOB</td>
			
			<td style="">18/08/22</td>
			<td>1</td>
			<td>2</td>
			<td><span class="badge badge-danger">Ongoing</span></td>
			<td style=""> <a href="/cases" class="list-icons-item text-teal"><i class="icon-eye"></i></a></td>
			
		</tr>
		</tbody>
</table></div><div class="datatable-footer"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 15 entries</div><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><a class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="-1" id="DataTables_Table_0_previous">←</a><span><a class="paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0">2</a></span><a class="paginate_button next" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" id="DataTables_Table_0_next">→</a></div></div></div>
</div></div>
<div id="div2" class="target">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Appointmets</h5>
			<div class="d-flex justify-content-end align-items-center">
				<a href="/appointmentrequests"> 
													
				<button type="submit" class="btn btn-primary ml-3">Appointment Requests <style color:blue>. </style>
					<span class="badge badge-warning badge-pill ml-auto ml-lg-0">2</span>
				</button>
			
			</a> 
			
			</div>
			
		</div>
	<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"><div class="datatable-header"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label><span>Filter:</span> <input type="search" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_0"></label></div><div class="dataTables_length" id="DataTables_Table_0_length"><label><span>Show:</span> <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="datatable-scroll-wrap"><table class="table datatable-responsive dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
		<thead>
			<tr role="row">
				<th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">Date</th>
				<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Time</th>
				<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="date: activate to sort column ascending" style="">Purpose</th>
				<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of Lawyers: activate to sort column ascending" >Location</th>
	
				<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="">Action</th>
				</tr>
		</thead>
		<tbody>
			
			
		<tr class="odd">
				<td class="dtr-control sorting_1" tabindex="0">08/18/2022</td>
				<td>13.00pm</td>
				
				<td >fix meeting james and harun</td>
				<td>KMC</td>
				
				<td style=""> <a href="/appointments" class="list-icons-item text-teal"><i class="icon-eye"></i></a></td>
				
			</tr>
			</tbody>
	</table></div><div class="datatable-footer"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 15 entries</div><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><a class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="-1" id="DataTables_Table_0_previous">←</a><span><a class="paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0">2</a></span><a class="paginate_button next" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" id="DataTables_Table_0_next">→</a></div></div></div>
	</div></div>


<div id="div3" class="target">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Discussions</h5>
			<div class="d-flex justify-content-end align-items-center">
				<a href="/Discussions"> 
													
				<button type="submit" class="btn btn-primary ml-3">Discussion Requests <style color:blue>. </style>
					<span class="badge badge-warning badge-pill ml-auto ml-lg-0">2</span>
				</button>
			
			</a> 
			
			</div>

		</div>
		<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"><div class="datatable-header"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label><span>Filter:</span> <input type="search" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_0"></label></div><div class="dataTables_length" id="DataTables_Table_0_length"><label><span>Show:</span> <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="datatable-scroll-wrap"><table class="table datatable-responsive dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
			<thead>
				<tr role="row">
					<th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">Initiated Date & Time</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Discussion Name</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="date: activate to sort column ascending" style="">Initiate By</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of Lawyers: activate to sort column ascending" >Last Reply Date & Time</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of clients: activate to sort column ascending" >Reply By</th>
					
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="">Action</th>
					</tr>
			</thead>
			<tbody>
				
				
			<tr class="odd">
					<td class="dtr-control sorting_1" tabindex="0">08/18/2022 09:40pm</td>
					<td>Undefined</td>
					
					<td style="">Cristina Galliani</td>
					<td>08/18/2022 09:45pm</td>
					<td>William Ang</td>
					
					<td style=""> <a href="/Discussions" class="list-icons-item text-teal"><i class="icon-eye"></i></a></td>
					
				</tr>
				</tbody>
		</table></div><div class="datatable-footer"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 15 entries</div><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><a class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="-1" id="DataTables_Table_0_previous">←</a><span><a class="paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0">2</a></span><a class="paginate_button next" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" id="DataTables_Table_0_next">→</a></div></div></div>
		</div></div>

<div id="div4" class="target">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Pending Payments</h5>
		</div>
			<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"><div class="datatable-header"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label><span>Filter:</span> <input type="search" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_0"></label></div><div class="dataTables_length" id="DataTables_Table_0_length"><label><span>Show:</span> <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="datatable-scroll-wrap"><table class="table datatable-responsive dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
				<thead>
					<tr role="row">
						<th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">Case ID</th>
						<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Client</th>
						<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="date: activate to sort column ascending" style="">Invoice Number</th>
						<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of Lawyers: activate to sort column ascending" >Full Amount</th>
						<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of Lawyers: activate to sort column ascending" >Paid Amount</th>
						<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of Lawyers: activate to sort column ascending" >Balance</th>
						
						<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of clients: activate to sort column ascending" >Due Date</th>
						<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="status: activate to sort column ascending" >Invoice</th>
						<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="">Action</th>
						</tr>
				</thead>
				<tbody>
					
					
				<tr class="odd">
						<td class="dtr-control sorting_1" tabindex="0">0001</td>
						<td>Cristina Galliani</td>
						
						<td style="">  5074.2019</td>
						<td>LKR . 20,000.00</td>
						<td>LKR . 10,000.00</td>
						<td>LKR . 10,000.00</td>
						<td>08/25/2022</td>
						<td><a href="#">Download</a></td>
						<td style=""> <a href="#" class="list-icons-item text-teal"><i class="icon-eye"></i></a></td>
						
					</tr>
					</tbody>
			</table></div><div class="datatable-footer"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 15 entries</div><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><a class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="-1" id="DataTables_Table_0_previous">←</a><span><a class="paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0">2</a></span><a class="paginate_button next" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" id="DataTables_Table_0_next">→</a></div></div></div>
			</div></div>
<div id="div5" class="target">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Recent Paymnets</h5>
		</div>
				<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"><div class="datatable-header"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label><span>Filter:</span> <input type="search" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_0"></label></div><div class="dataTables_length" id="DataTables_Table_0_length"><label><span>Show:</span> <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="datatable-scroll-wrap"><table class="table datatable-responsive dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
					<thead>
						<tr role="row">
							<th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">Payment ID</th>
							<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Case ID</th>
							<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="date: activate to sort column ascending" style="">Invoice Number</th>
							<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of Lawyers: activate to sort column ascending" >Full Amount</th>
							<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of Lawyers: activate to sort column ascending" >Paid Amount</th>
							<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of Lawyers: activate to sort column ascending" >Recently Paid Amount</th>
							<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of Lawyers: activate to sort column ascending" >Balance</th>


							<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of clients: activate to sort column ascending" >Paid By</th>

							<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="status: activate to sort column ascending" >Paid Date</th>
							<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of clients: activate to sort column ascending" >Due Date</th>
							<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="status: activate to sort column ascending" >Payment Method</th>

							<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="">Action</th>
							</tr>
					</thead>
					<tbody>
						
						
					<tr class="odd">
							<td class="dtr-control sorting_1" tabindex="0">PAY-001</td>
							<td>0001</td>
							
							<td style=""> 5074.2019</td>
							<td>LKR . 40,000.00</td>
							<td>LKR . 20,000.00</td>
						<td>LKR . 10,000.00</td>
						<td>LKR . 10,000.00</td>
						<td>Cristina </td>
							<td>2019-12-19</td>
							<td>2019-12-19</td>
							<td>online payment</td>
							
							<td style=""> <a href="#" class="list-icons-item text-teal"><i class="icon-eye"></i></a></td>
							
						</tr>
						</tbody>
				</table></div><div class="datatable-footer"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 15 entries</div><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><a class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="-1" id="DataTables_Table_0_previous">←</a><span><a class="paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0">2</a></span><a class="paginate_button next" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" id="DataTables_Table_0_next">→</a></div></div></div>
    </div></div>
<div id="div6" class="target">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Recent Users</h5>
		</div>
		<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"><div class="datatable-header"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label><span>Filter:</span> <input type="search" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_0"></label></div><div class="dataTables_length" id="DataTables_Table_0_length"><label><span>Show:</span> <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="datatable-scroll-wrap"><table class="table datatable-responsive dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
			<thead>
				<tr role="row">
					<th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">Name</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Email</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="date: activate to sort column ascending" style="">Contact Number</th>
					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Number of Lawyers: activate to sort column ascending" >Account Status</th>

					<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="">Action</th>
					</tr>
			</thead>
			<tbody>
				
				
			<tr class="odd">
					<td class="dtr-control sorting_1" tabindex="0">john</td>
					<td>john@gmail.com</td>
					
					<td style="">0456788975</td>
					<td><span class="badge badge-danger">Pending</span></td>
					
					<td style=""> <a href="/customers" class="list-icons-item text-teal"><i class="icon-eye"></i></a></td>
					
				</tr>
				</tbody>
		</table></div><div class="datatable-footer"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 15 entries</div><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><a class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="-1" id="DataTables_Table_0_previous">←</a><span><a class="paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0">2</a></span><a class="paginate_button next" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" id="DataTables_Table_0_next">→</a></div></div></div>
		</div></div>

</section>
<script type="text/javascript">
	
	document.getElementById("div2").style.display = "none";
	document.getElementById("div3").style.display = "none";
	document.getElementById("div4").style.display = "none";
	document.getElementById("div5").style.display = "none";
	document.getElementById("div6").style.display = "none";
	
		jQuery(function(){
			jQuery('#showall').click(function(){
				jQuery('.target').hide();
				
			});
			jQuery('.single').click(function(){
				jQuery('.target').hide();
				jQuery('#div'+$(this).attr('target')).show();
			});	
		});
</script>
<!-- /basic responsive configuration -->

</div>
<!-- /content area -->
				</div>
				<!-- /content area -->
@endsection				