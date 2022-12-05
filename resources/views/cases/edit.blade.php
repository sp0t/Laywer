@extends('layouts.app')

@section('jsfiles')
    <script src="{{ asset('assets/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/demo_pages/form_select2.js') }}"></script>    
    <script src="{{ asset('assets/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>
@endsection

@section('breadcrumb')
	<span class="breadcrumb-item"><a href="{{ route('case.index') }}" class="breadcrumb-item">Cases</a></span>
	<span class="breadcrumb-item active">Edit Case</span>
@endsection

@section('content')

<div class="content">
	<div class="card content-border-style">
        <div class="card-header bg-white header-elements-inline">            
            <h5 class="card-title">Edit Case - {{ str_pad($case->id, 4, '0', STR_PAD_LEFT) }}</h5>  

            <div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('case.index') }}">							
                <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i class="fas fa-arrow-left"></i></b>
                     Back To Cases</button></a>
            </div>
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#tab-case-details" class="nav-link {{ is_null($tab) ? 'active' : '' }}" data-toggle="tab">Case Deatils</a></li>
                <li class="nav-item"><a href="#tab-milestones" class="nav-link {{ $tab == 'milestone' ? 'active' : '' }}" data-toggle="tab">Milestones</a></li>
                <!-- <li class="nav-item"><a href="#tab-documents" class="nav-link" data-toggle="tab">Documents</a></li>
                <li class="nav-item"><a href="#tab-payments" class="nav-link " data-toggle="tab">Payments</a></li>                 -->
            </ul>

            <div class="tab-content">
            	<div class="tab-pane fade show {{ is_null($tab) ? 'active' : '' }}" id="tab-case-details">
		            <form method="POST" id="form-entry" action="{{ route('case.update', [$case->id]) }}">
		            	<input type="hidden" name="_method" value="PATCH">
		                <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                <div class="form-group row">
		                    <label class="col-form-label col-lg-2">Case Type <span class="text-danger">*</span></label>
		                    <div class="col-lg-9">
		                        <!-- !! Form::select('type', $types, $case->type, array('class' => 'form-control select', 'id' => 'type', 'required')); !!} -->
                                <input type="text" name="type" class="form-control" required="" placeholder="Enter Title" required maxlength="50" value="{{ $case->type }}">
		                    </div>
		                </div>

		                <div class="form-group row">
		                    <label class="col-form-label col-lg-2">Case Title <span class="text-danger">*</span></label>
		                    <div class="col-lg-9">
		                        <input type="text" name="title" class="form-control" required="" placeholder="Enter Title" required value="{{ $case->title }}">
		                    </div>
		                </div>

		                <div class="form-group row">
		                    <label class="col-form-label col-lg-2">Case description <span class="text-danger">*</span></label>
		                    <div class="col-lg-9">
		                        <textarea rows="5" cols="5" name="description" class="form-control" required="" placeholder="Enter Description">{{ $case->description }}</textarea>
		                    </div>
		                </div>

		                <div class="form-group row">
							<label class="col-form-label col-lg-2">Lawyers <span class="text-danger">*</span></label>
							<div class="col-lg-9">
		                        {!! Form::select('lawyers[]', $lawyers, $case->case_lawyers()->pluck('lawyer_id'), array('class' => 'form-control select', 'id' => 'lawyers', 'multiple' => 'multiple', 'required')); !!}
							</div>
						</div>

		                <div class="form-group row">
							<label class="col-form-label col-lg-2">Clients <span class="text-danger">*</span></label>
							<div class="col-lg-9">
		                        {!! Form::select('clients[]', $clients, $case->case_clients()->pluck('customer_id'), array('class' => 'form-control select', 'id' => 'clients', 'multiple' => 'multiple', 'required')); !!}
							</div>
						</div>
		                <div class="form-group row">
							<label class="col-form-label col-lg-2">Status <span class="text-danger"></span></label>
							<div class="col-lg-9">
		                        {!! Form::select('status', $status, $case->status, array('class' => 'form-control select', 'id' => 'status')); !!}
							</div>
						</div>
		                <div class="form-group row">
							<label class="col-form-label col-lg-2"></label>
							<div class="col-lg-9">
		                        <div class="custom-control custom-switch custom-control-danger mb-2">
                                <input type="checkbox" class="custom-control-input" id="inactive" name="inactive" {{ $case->inactive == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="inactive">Inactive</label>
                            </div>
							</div>
						</div>																	
		                <div class="text-right">
		                    <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i class="fas fa-save"></i></b>Save</button>
		                </div>                
		            </form>            		
            	</div>
                <div class="tab-pane fade show {{ $tab == 'milestone' ? 'active' : '' }}" id="tab-milestones">
                    <div class="d-flex justify-content-end align-items-center">
                        <a class="btn btn-primary btn-labeled btn-labeled-left btn-sm milestone-add" href="{{ route('case.milestones.add', [ $case->id ]) }}">
                            <b><i class="fas fa-plus-circle"></i></b>Add New Milestone
                        </a>
                    </div>
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer" style="width: 100%;">
                        <div class="datatable-scroll-wrap">
                            <table class="table table-striped text-nowrap table-customers dataTable no-footer dtr-column collapsed" id="dataTables-milestones" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th>#</th>
                                        <th>Milestone Title/Description</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Created On</th>
                                        <th>Action</th>
                                </thead>

                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>                     
                </div>
            </div>
        </div>		

	</div>
</div>
<form id="form-milestone-status" method="POST" action="">
    <input type="hidden" name="status" id="milestone-status" value="">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
<div id="modal_default" class="modal fade" tabindex="-1">
    <div class="modal-dialog" id="modal-dialog-content">

    </div>
</div>
@endsection

@section('scripts')
<script src="{{URL::asset('assets/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        
        $('#dataTables-milestones').DataTable({
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
            ajax: '{{ route('case.milestone') }}',
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>r',
            language: {            
                paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'target_date', name: 'target_date'},
                {data: 'status', name: 'status'},
                {data: 'created_by', name: 'created_by'},
                {data: 'created_at', name: 'created_at'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}                
            ]
        });
    });
</script>
<script type="text/javascript">
    $('#form-entry').validate({
        errorClass: 'invalid-feedback',
        successClass: 'valid-feedback',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        validClass: "validation-valid-label",
        success: function(e) {
            e.prev('input').removeClass('is-invalid');
            e.closest('.form-group').removeClass('has-feedback');
            e.closest('label').remove();
        },
        errorPlacement: function(error, element) {
            if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo( element.parent() );
            }else {
                error.insertAfter(element);
                element.addClass('is-invalid');
            }
        },
        submitHandler: function(form) {
            $.showWorking('Please wait...');
            $.ajax({
                type: 'POST',
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType: "json",
                success: function(rtn)
                {
                    if (rtn.status == true){
                        window.location.href = '{{ route('case.index') }}';
                    }   
                    else{
                        $.hideWorking();
                        noty_error('Failed', rtn.msg);    
                    }
                },
                error:function(jq, status, error){
                    if(jq.status == 422){
                        $.hideWorking();
                        var errors = jq.responseJSON;
                        noty_error('Failed', errors);
                    }else{
                        $.hideWorking();
                        noty_error('Failed', 'An error occured while saving.');
                    }
                }
            });
            return false;
        }
    });

    $(document).on("click",".milestone-add, .milestone-edit, .milestone-view",function(e) {
        e.preventDefault();
        $.showWorking('Please wait...');
        $.ajax({
            type: 'GET',
            url: $(this).attr("href"),
            dataType: "json",
            success: function(rtn)
            {
                if(rtn.status){
                    $('#modal-dialog-content').html(rtn.html);
                    $('#modal_default').modal('toggle');
                } else {
                    noty_error('Failed', rtn.msg);
                }
                
                $.hideWorking();
            },
            error:function(jq, status, error){
                if(jq.status == 422){
                    $.hideWorking();
                    var errors = jq.responseJSON;
                    noty_error('Failed', errors);
                }else{
                    $.hideWorking();
                    noty_error('Failed', 'An error occured while saving.');
                }
            }
        });
        return false;
    });

    $(document).on("click",".milestone-submit",function(e) {
        e.preventDefault();
        $.showWorking('Please wait...');
        var form = $('#form-entry-modal');
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: $(form).serialize(),
            dataType: "json",
            success: function(rtn)
            {
                if(rtn.status){                    
                    $('#modal_default').modal('toggle');
                    noty_success('Success', rtn.msg);
                    $('#dataTables-milestones').DataTable().ajax.reload();
                    $.hideWorking();
                } else {
                    noty_error('Failed', rtn.msg);
                }
                
                $.hideWorking();
            },
            error:function(jq, status, error){
                if(jq.status == 422){
                    $.hideWorking();
                    var errors = jq.responseJSON;
                    noty_error('Failed', errors);
                }else{
                    $.hideWorking();
                    noty_error('Failed', 'An error occured while saving.');
                }
            }
        });
        return false;      
    });  

    $(document).on("change",".milestone-status",function(e) {
        e.preventDefault();
        var url = '{{ route('case.milestones.status-update', [$case->id, '#mid']) }}';        
        var update_url = url.replace('#mid', $(this).attr('data-id'));
        $('#form-milestone-status').attr('action', update_url);
        $('#milestone-status').val($(this).val());

        $.showWorking('Please wait...');
        var form = $('#form-milestone-status');
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: $(form).serialize(),
            dataType: "json",
            success: function(rtn)
            {
                if(rtn.status){                    
                    noty_success('Success', rtn.msg);
                } else {
                    noty_error('Failed', rtn.msg);
                }
                
                $.hideWorking();
            },
            error:function(jq, status, error){
                if(jq.status == 422){
                    $.hideWorking();
                    var errors = jq.responseJSON;
                    noty_error('Failed', errors);
                }else{
                    $.hideWorking();
                    noty_error('Failed', 'An error occured while saving.');
                }
            }
        });
        return false;      
    });           
</script>
@endsection