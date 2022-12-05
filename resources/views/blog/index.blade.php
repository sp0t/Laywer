@extends('layouts.app')
@section('breadcrumb')
<span class="breadcrumb-item active"> Blogs </span>
@endsection

@section('content')

<div class="content">

					
					

    <!-- Basic responsive configuration -->
    <div class="card">
        <div class="card-header bg-white header-elements-inline">
            <h6 class="card-title">Blogs</h6>
            <div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('blog.create') }}">							
                    <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i class="fas fa-plus-circle"></i></b>Add New blog</button>
                </a>
            </div>
        </div>

        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
            <div class="datatable-scroll-wrap">
                <table class="table table-striped text-nowrap table-customers dataTable no-footer dtr-column collapsed" id="dataTables" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr role="row">
                            
                            <th>Title</th>
                            <th>Created_by</th>
                            <th>Updated_by</th>
                            
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Actions</th>
                    </thead>

                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /content area -->
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
            ajax: '{{ route('blog.load_ajax') }}',
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>r',
            language: {            
                paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
            },
            columns: [
               
                {data: 'title', name: 'title'},
                {data: 'created_by', name: 'created_by'},
                {data: 'updated_by', name: 'updated_by'},
               
                
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ]
        });
        // $('.dataTables_length select').select2({
        //     minimumResultsForSearch: Infinity,
        //     width: 'auto'
        // });
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
