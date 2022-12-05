@extends('layouts.app')
@section('jsfiles')
    <script src="{{ asset('assets/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('assets/global_assets/js/demo_pages/form_select2.js') }}"></script>    
    <script src="{{ asset('assets/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>
@endsection

@section('breadcrumb')
    <span class="breadcrumb-item"><a href="{{ route('case.index') }}" class="breadcrumb-item">Cases</a></span>
    <span class="breadcrumb-item active">Add New Case</span>
@endsection

@section('content')
<div class="content">
    <div class="card content-border-style">
        <div class="card-header bg-white header-elements-inline">            
            <h5 class="card-title">Add New Case</h5>  

            <div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('case.index') }}">							
                <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i class="fas fa-arrow-left"></i></b>
                     Back To Cases</button></a>
            </div>
        </div>

        <div class="card-body">
            <form method="POST" id="form-entry" action="{{ route('case.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Case Type <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <!-- ! Form::select('type', $types, null, array('class' => 'form-control select', 'id' => 'type', 'required')); !!} -->
                        <input type="text" name="type" class="form-control" required="" placeholder="Enter Title" required maxlength="50">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Case Title <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input type="text" name="title" class="form-control" required="" placeholder="Enter Title" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Case description <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <textarea rows="5" cols="5" name="description" class="form-control" required="" placeholder="Enter Description"></textarea>
                    </div>
                </div>

                <div class="form-group row">
					<label class="col-form-label col-lg-3">Lawyers <span class="text-danger">*</span></label>
					<div class="col-lg-9">
                        {!! Form::select('lawyers[]', $lawyers, null, array('class' => 'form-control select', 'id' => 'lawyers', 'multiple' => 'multiple', 'required')); !!}
					</div>
				</div>

                <div class="form-group row">
					<label class="col-form-label col-lg-3">Clients <span class="text-danger">*</span></label>
					<div class="col-lg-9">
                        {!! Form::select('clients[]', $clients, null, array('class' => 'form-control select', 'id' => 'clients', 'multiple' => 'multiple', 'required')); !!}
					</div>
				</div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i class="fas fa-save"></i></b>Save</button>
                </div>                
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
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
</script>
@endsection