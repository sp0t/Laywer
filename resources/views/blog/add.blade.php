@extends('layouts.app')

@section('jscripts')

<!-- Theme JS files -->
<script src="{{ asset('assets/global_assets/js/plugins/editors/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('assets/global_assets/js/demo_pages/editor_summernote.js') }}"></script>
<!-- /theme JS files -->
@endsection

@section('breadcrumb')
    <span class="breadcrumb-item"><a href="{{ route('blog.index') }}" class="breadcrumb-item">Blog</a></span>
    <span class="breadcrumb-item active">Add New Blog</span>
@endsection


@section('content')

<div class="content">

    <!-- Vertical form options -->
    

            <!-- Basic layout-->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Add Blog</h5>
                   
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="{{ route('blog.index') }}">
                        <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i class="fas fa-arrow-left"></i></b>Back to Blog</button>
                        </a>
                    </div>

                </div>
               
                <div class="card-body">
                    <form action="{{ route('blog.store') }}" id="form-entry">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @csrf
                        <div class="form-group">
                            <label>Title Of The Blog</label>
                            <input type="text" class="form-control font-weight-light" placeholder="Enter Title" id="title" name="title" required >
                        </div>
                        <div class="form-group ">
                            <label class>Short Description <span class="text-danger">*</span></label>
                            <div class>
                                <textarea rows="5" cols="5" id="description" name="description" class="form-control" required="" placeholder="Enter Description" ></textarea>
                            </div>
                        </div> 
                        <label class>Blog Post <span class="text-danger">*</span></label>
                        <div class="form-group">
                            <textarea id="mysummernote" name="mysummernote" ></textarea>
                            <!-- <div class="summernote">                            
                            </div> -->
                        </div> 
                                             
                        <div class="form-check form-check-right text-right">
                            <input type="checkbox" class="form-check-input" id="dc_rs_c" checked="" >
                            <label class="form-check-label" for="dc_rs_c">Notify User</label>
                        </div> 
                        <br>

                        <div class="text-right">
                            <button  type="submit"    class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i class="fas fa-save"></i></b>Save changes</button>
                        </div>
                        

                        

                        
                    </form>
                </div>
            </div>
            <!-- /basic layout -->

      

      
  
    <!-- /vertical form options -->


 

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
                        window.location.href = '{{ isset($return_url) ? urldecode($return_url) : route('blog.index') }}';
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






