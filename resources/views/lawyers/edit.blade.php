@extends('layouts.app')
@section('breadcrumb')
    <span class="breadcrumb-item"><a href="{{ route('lawyer.index') }}" class="breadcrumb-item">Lawyer</a></span>
    <span class="breadcrumb-item active">Edit Lawyer</span>
@endsection

@section('content')
<div class="content">
    @include('common.errors')
    @include('common.success')
    <div class="card">
        <div class="card-header bg-white header-elements-inline">
            
            <h5 class="card-title">Edit Lawyers</h5>  
        
          
            <div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('lawyer.index') }}">
                <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i class="fas fa-arrow-left"></i></b>Back to Lawyers</button>
                </a>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('lawyer.update', [$lawyer->id]) }}" id="form-entry">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Full name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control font-weight-light" placeholder="Enter Full Name" name="name" required value="{{ $lawyer->name }}">
                        </div>
                        <div class="col-lg-6">
                            <label>Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control font-weight-light" placeholder="Enter Address" name="address" required value="{{ $lawyer->address }}">
                        </div>
                       
                    </div>
                </div>
    
                <div class="form-group">
                    <div class="row">
                       
                        <div class="col-lg-6">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control font-weight-light" placeholder="Enter Email" name="email" required value="{{ $lawyer->email }}">
                        </div>
                        <div class="col-lg-3">
                            <label>Contact Primary <span class="text-danger">*</span></label>
                            <input type="text" class="form-control font-weight-light" placeholder="Enter Primary Contact Number" name="contact_no1" required value="{{ $lawyer->contact_no1 }}">
                        </div>
                        <div class="col-lg-3">
                            <label>Contact Secondary</label>
                            <input type="text" class="form-control font-weight-light" placeholder="Enter Secondary Contact Number" name="contact_no2" value="{{ $lawyer->contact_no2 }}">
                        </div>                       
                        
                    </div>
                </div>
    
            
                <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control font-weight-light" placeholder="Enter Password" name="password">
                            </div>
                            <div class="col-lg-6">
                                <label>Role <span class="text-danger">*</span></label>
                                <div>
                                    <select name="role" class="form-control" required>
                                        <option value="">Choose an option</option> 
                                        <option value="1">Lawyer</option>
                                        <option value="2">India</option>
                                        <option value="3">California</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="form-group">
                    <div class="row">       
                        <div class="col-lg-6">
                            <div class="custom-control custom-switch custom-control-danger mb-2">
                                <input type="checkbox" class="custom-control-input" id="inactive" name="inactive" {{ $lawyer->status == 0 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="inactive">Inactive</label>
                            </div>
                        </div>
                       
                    </div>
                </div> 
                <div class="form-check form-check-right text-right">
                    <input type="checkbox" class="form-check-input" id="dc_rs_c">
                    <label class="form-check-label" for="dc_rs_c">Notify User</label>
                </div> 
                 <br>
    
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
                        window.location.href = '{{ route('lawyer.index') }}';
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