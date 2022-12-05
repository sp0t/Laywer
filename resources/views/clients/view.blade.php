@extends('layouts.app')

@section('breadcrumb')
    <span class="breadcrumb-item"><a href="{{ route('client.index'); }}" class="breadcrumb-item">Client</a></span>
    <span class="breadcrumb-item active">View Client</span>
@endsection

@section('content')

<div class="content">

    <!-- Form validation -->
    <div class="card col-lg-6">
        <div class="card-header bg-white header-elements-inline">            
            
            <h5 class="card-title">View Client - {{ $client->name }}</h5>  

            <div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('client.index') }}">							
                <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i class="fas fa-arrow-left"></i></b>Back to Clients</button></a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Full Name:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{{ $client->name }}</label>
                    </div>       
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Contact Person:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{{ $client->contact_person }}</label>
                    </div>       
                </div>                
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Address:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{{ $client->address }}</label>
                    </div>                       
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Official Address:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{{ $client->official_address }}</label>
                    </div>                       
                </div>                
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Contact:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{{ $client->contact_no }}</label>
                    </div>                       
                </div>  
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Email:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{{ $client->email }}</label>
                    </div>                       
                </div>  
                <div class="row">
                    <div class="col-md-3">
                        <label><b>verified:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{!! $client->verified == 1 ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-danger">No</span>' !!}</label>
                    </div>                       
                </div> 
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Inactive:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{!! $client->inactive == 1 ? '<span class="badge badge-danger">Inactive</span>' : '<span class="badge badge-success">Active</span>' !!}</label>
                    </div>                       
                </div>   
                <div class="row">
                    <div class="col-md-3">
                        <label><b>Created Date Time:</b></label>
                    </div>
                    <div class="col-md-9">
                        <label>{{ $client->created_at }}</label>
                    </div>                       
                </div>                                                                                                                                          
            </div>
        </div>
    </div>
</div>

@endsection