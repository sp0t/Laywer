@extends('layouts.app')
@section('dashname')
<div class="page-header page-header-light">
    

    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active"><a href="/banners" class="breadcrumb-item">Mobile Banners  </a>/ New Banner</span>
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

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">New Banner</h5>
            </div>

            <div class="card-body">
                <form method="post" id="add_item_form" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Title</label>
                        <input name="title" type="text" class="form-control" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label>Category <span class="text-danger">*</span></label>
                        <select class="form-control" name="banner_type" id="banner_type" required>
                            <option value="">--Please Select--</option>
                            @if($banner_types)
                                @foreach($banner_types as $b)
                                    <option value="{{$b->id}}"  data-image-dim="{{$b->image_width}}x{{$b->image_height}}">{{$b->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>*Channel</label>
                        {{Form::select('channel', ['WEB'=>'Web','MOBILE'=>'Mobile'], null, ['class' => 'form-control', 'placeholder' => 'Please Select', 'required'])}}
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea name="" rows="5" cols="5" class="form-control" placeholder="Enter your description here"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="custom-file">
                            <input type="file" name="image" class="custom-file-input">
                            <span class="custom-file-label">Upload Banner</span>
                        </label>
                        <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                    </div>
                    <div class="checkbox" style="margin-top: 10px;">
                        <label>
                            <input type="checkbox" name="enabled" value="1"> Enabled
                        </label>
                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                        <button type="submit" id="btn_save" class="btn btn-primary" style="margin-right: 50px;">Save</button>
                        <button class="btn btn-light">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
<script type="text/javascript">
    $(document).ready(function () {
        $("body").on("submit", "#add_item_form", function (e) {
            e.preventDefault();
            alert(dd);
            var btn = $("#btn_save");
            btn.button('loading');
            $.ajax({
                url: "{{route('mpl.admin.banners.store')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: new FormData(this),
                dataType: 'json',
                success: function (data) {
                    if (data.status == true) {
                        $.notify(data.msg, "success");
                        btn.button('reset');
                        location.href = "{{route('mpl.admin.banners.index')}}";
                    } else {
                        $.notify(data.msg, "error");
                        btn.button('reset');
                    }
                },
                error: function () {
                    alert('Operation failed. Please try again.');
                    btn.button('reset');
                }
            });
        });

        $("#add_item_form").on('change', '#banner_type', function(){

            if($(this).val() == ""){
                $("#image_dimension").text("");
                return;
            }
            
            var image_dimension = $('#banner_type option:selected').data('image-dim');
            $("#image_dimension").text("("+ image_dimension +")");
        });
    });
</script>
@endsection
