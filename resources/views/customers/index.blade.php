@extends('layouts.app')
@section('breadcrumb')
<span class="breadcrumb-item active"> Users </span>
@endsection

@section('content')

<div class="content">
    @include('common.errors')
    @include('common.success')
    <!-- Customers -->
    <div class="card">
        <div class="card-header bg-white header-elements-inline">
            <h6 class="card-title">Users</h6>
            <div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('customer.create'); }}">							
                    <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i class="fas fa-plus-circle"></i></b>Add New Users</button>
                </a>
            </div>
        </div>

        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
            <div class="datatable-scroll-wrap">
                <table class="table table-striped table-customers dataTable no-footer dtr-column collapsed" id="dataTables" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr role="row">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Verified</th>
                            <th>Inactive</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Actions</th>
                    </thead>

                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /customers -->

</div>

@endsection

@section('scripts')
<script src="{{URL::asset('assets/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        
        $('#dataTables').DataTable({
            pageLength : 25,
            order: [[6, 'desc']],    
            processing: true,
            serverSide: true,
            oLanguage: {
                    "sProcessing": '<span class="label label-flat label-rounded label-icon border-purple text-purple-600"><i class="icon-spinner9 spinner position-left"></i>  Loading...</span>',
                    sSearch: '<span>Filter : </span> _INPUT_',
                    sSearchPlaceholder: 'Type to filter...',
                    sLengthMenu: '<span>Show : </span> _MENU_',
                },
            ajax: '{{ route('customer.load_ajax') }}',
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>r',
            language: {            
                paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'contact_no', name: 'contact_no'},
                {data: 'email', name: 'email'},
                {data: 'verified', name: 'verified'},
                {data: 'inactive', name: 'inactive'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ]
        });
        
        $('body').on('click', '.delete-item', function (e) {
            $(this).confirmation({placement:'left', onConfirm:function(event, element){
                alert('ddd');
            }});
        });        
    });
</script>

@endsection