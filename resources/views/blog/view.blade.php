@extends('layouts.app')

@section('breadcrumb')
    <span class="breadcrumb-item"><a href="{{ route('blog.index'); }}" class="breadcrumb-item">Blogs</a></span>
    <span class="breadcrumb-item active">View Blog</span>
@endsection

@section('content')


<div class="content">
    
    <!-- Form validation -->
    <div class="card col-lg-6">
        <div class="card-header bg-white header-elements-inline">            
            
            <h5 class="card-title">View Blog - {{ $blog->id }}</h5>  

            <div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('blog.index') }}">							
                <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i class="fas fa-arrow-left"></i></b>Back to Blogs</button></a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Blog Title:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{{   $blog ->title }}</label>
                    </div>       
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Blog Post :</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{{  $blog ->mysummernote  }}</label>
                    </div>                       
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Short Description:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{{ $blog ->description  }}</label>
                    </div>                       
                </div>  
                              
                               
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Notify:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{!!  $blog->status == 0 ? '<span class="badge badge-danger">Inactive</span>' : '<span class="badge badge-success">Active</span>' !!}</label>
                    </div>                       
                </div>   
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Created Date Time:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{{ $blog->created_at }}</label>
                    </div>                       
                </div>                                                                                                                                          
            </div>
        </div>
    </div>
</div>

@endsection