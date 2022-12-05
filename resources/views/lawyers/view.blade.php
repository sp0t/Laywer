@extends('layouts.app')

@section('breadcrumb')
    <span class="breadcrumb-item"><a href="{{ route('lawyer.index'); }}" class="breadcrumb-item">Lawyers</a></span>
    <span class="breadcrumb-item active">View Lawyer</span>
@endsection

@section('content')

<div class="content">

    <!-- Form validation -->
    <div class="card col-lg-6">
        <div class="card-header bg-white header-elements-inline">            
            
            <h5 class="card-title">View Lawyer - {{ $lawyer->name }}</h5>  

            <div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('lawyer.index') }}">							
                <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i class="fas fa-arrow-left"></i></b>Back to Lawyers</button></a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Full Name:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{{ $lawyer->name }}</label>
                    </div>       
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Address:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{{ $lawyer->address }}</label>
                    </div>                       
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Contact Primary:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{{ $lawyer->contact_no1 }}</label>
                    </div>                       
                </div>  
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Contact Secondary:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{{ $lawyer->contact_no2 }}</label>
                    </div>                       
                </div>                  
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Email:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{{ $lawyer->email }}</label>
                    </div>                       
                </div>  
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Role:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{{ $lawyer->role }}</label>
                    </div>                       
                </div>                 
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Inactive:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{!! $lawyer->status == 0 ? '<span class="badge badge-danger">Inactive</span>' : '<span class="badge badge-success">Active</span>' !!}</label>
                    </div>                       
                </div>   
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Created Date Time:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{{ $lawyer->created_at }}</label>
                    </div>                       
                </div>                                                                                                                                          
            </div>
        </div>
    </div>
</div>

@endsection