@extends('layouts.app')

@section('breadcrumb')
    <span class="breadcrumb-item"><a href="{{ route('customer.index'); }}" class="breadcrumb-item">User</a></span>
    <span class="breadcrumb-item active">Edit User</span>
@endsection

@section('content')

<div class="content">
    @include('common.errors')
    @include('common.success')
    <!-- Form validation -->
    <div class="card">
        <div class="card-header bg-white header-elements-inline">
            
            <h5 class="card-title">Edit User</h5>  
        
          
            <div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('customer.index') }}">							
                <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i class="fas fa-arrow-left mr-1"></i></b>Back to Users</button></a>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('customer.update', [$customer->id]); }}" id="form-entry">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Full name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control font-weight-light" placeholder="Enter Full Name" name="name" value="{{ old('name', $customer->name) }}" required>
                        </div>
                        <!-- <div class="col-lg-6">
                            <label>Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control font-weight-light" placeholder="Enter Address" name="address" value="{{ old('name', $customer->address) }}" required>
                        </div> -->
                        <div class="col-lg-6">
                            <label>Contact <span class="text-danger">*</span></label>
                            <input type="text" class="form-control font-weight-light" placeholder="Enter  Contact Number" name="contact_no" value="{{ old('name', $customer->contact_no) }}" required>
                           
                        </div>                       
                    </div>
                </div>
    
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control font-weight-light" placeholder="Enter Email" name="email" value="{{ old('name', $customer->email) }}" required>
                        </div>
                        <div class="col-lg-6">
                            <label>Password</label>
                            <input type="password" class="form-control font-weight-light" placeholder="Enter Password" name="password">
                        </div>                        
                    </div>
                </div>
    
                <div class="form-group">
                    <div class="row">       
                        <div class="col-lg-6">
                            <div class="custom-control custom-switch custom-control-danger mb-2">
                                <input type="checkbox" class="custom-control-input" id="inactive" name="inactive" {{ $customer->inactive == 1 ? 'checked' : '' }}>
                                <label class="custom-control-label" for="inactive">Inactive</label>
                            </div>
                        </div>
                       
                    </div>
                </div>                
                <div class="form-group">
                    <div class="row">       
                        <div class="col-lg-6">
                            <div class="form-check form-check">
                                <input type="checkbox" class="form-check-input" id="notify_user" name="notify_user">
                                <label class="form-check-label" for="notify_user">Notify User</label>
                            </div>
                        </div>
                       
                    </div>
                </div>                
                 
                <div class="custom-control custom-control-right custom-switch text-right mb-2">
                    <input type="checkbox" class="custom-control-input" id="sc_rs_c" name="promote_as_client">
                    <label class="custom-control-label" for="sc_rs_c">Promote as Client</label>
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
                        window.location.href = '{{ route('customer.index') }}';
                    }   
                    else{
                        $.hideWorking();
                        jGrowl_error('Failed', rtn.msg);
                    }
                },
                error:function(jq, status, error){
                    if(jq.status == 422){
                        $.hideWorking();
                        var errors = jq.responseJSON;
                        jGrowl_json_error('Eror', errors);
                    }else{
                        $.hideWorking();
                        jGrowl_error('Failed','An error occured while saving.');    
                    }
                }
            });
            return false;
        }
    });    
</script>
@endsection