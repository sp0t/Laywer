@extends('layouts.app')
@section('breadcrumb')
    <span class="breadcrumb-item active">Cases Type</span>
@endsection

@section('content')
<div class="content">
	<div class="card content-border-style">
	    <div class="row-fluid">
		    <div class="card-header bg-white header-elements-inline">
		       
		        <h5 class="card-title">{{ $page_meta['page_title'] }}</h5>  
		            <div class="d-flex justify-content-end align-items-center">
						<a href="{{ url('cases/type/create'); }}">							
		                    <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i class="fas fa-plus-circle"></i></b>Add New  Cases Type</button>
		                </a>
		            </div>
		    </div>
		    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
		        <div class="datatable-scroll-wrap">
		            <table class="table table-striped text-nowrap table-customers dataTable no-footer dtr-column collapsed" id="dataTables" role="grid" aria-describedby="DataTables_Table_0_info">
		                <thead>
		                    <tr role="row">
		                        <th>Case Id</th>
		                        <th>type</th>
		                      
		                        <th>Actions</th>
		                </thead>

		                <tbody>
		                </tbody>
		            </table>
		        </div>
		    </div>       
	    </div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{URL::asset('assets/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        
        $('#dataTables').DataTable({
            pageLength : 25,
            order: [[0, 'desc']],    
            processing: true,
            serverSide: true,
            oLanguage: {
                    "sProcessing": '<span class="label label-flat label-rounded label-icon border-purple text-purple-600"><i class="icon-spinner9 spinner position-left"></i>  Loading...</span>',
                    sSearch: '<span>Filter : </span> _INPUT_',
                    sSearchPlaceholder: 'Type to filter...',
                    sLengthMenu: '<span>Show : </span> _MENU_',
                },
            ajax: '{{ route('cases_type.load_ajax') }}',
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>r',
            language: {            
                paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                
                {data: 'actions', name: 'actions', orderable: false, searchable: false}                
            ]
        });
    });
</script>

@endsection