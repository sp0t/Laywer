@extends('layouts.app')
@section('breadcrumb')
<span class="breadcrumb-item"><a href="{{ route('client.index') }}" class="breadcrumb-item">Client</a></span>
<span class="breadcrumb-item active">Edit Client</span>
@endsection

@section('content')

<div class="content">
    <!-- Inner container -->
    <div class="d-lg-flex align-items-lg-start">
        <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left wmin-300 border-0 shadow-none sidebar-expand-lg">
            <div class="sidebar-content">
                <div class="card  content-border-style">
                    <div class="card-body text-center">
                        <div class="card-img-actions d-inline-block mb-3">
                            <img class="img-fluid rounded-circle" src="{{ asset('assets/global_assets/images/demo/users/face11.jpg') }}" width="170" height="170" alt="">
                        </div>

                        <h6 class="font-weight-semibold mb-0">{{ $client->name }}</h6>
                        <!-- <span class="d-block opacity-75">Head of UX</span> -->
                    </div>

                    <ul class="nav nav-sidebar">
                        <li class="nav-item">
                            <a href="#profile" class="nav-link active" data-toggle="tab">
                                <i class="icon-user"></i>
                                 Personal Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#cases-tab" class="nav-link" data-toggle="tab">
                                <i class="icon-calendar3"></i>
                                Cases
                                <span class="badge badge-dark badge-pill ml-auto">{{ is_null($cases) ? 0 : count($cases) }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#payment-tab" class="nav-link" data-toggle="tab">
                                <i class="icon-envelop2"></i>
                                Payments
                                <span class="badge badge-dark badge-pill ml-auto">{{ is_null($payments) ? 0 : count($payments) }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="tab-content flex-1">
            <!-- Right content -->
            <div class="tab-pane fade active show" id="profile">
                <!-- Profile info -->
                <div class="card content-border-style">
                    <div class="card-header bg-white header-elements-inline">
                        <h6 class="card-title">Profile information</h6>

                        <div class="d-flex justify-content-end align-items-center">
                            <a href="{{ route('client.index') }}">
                            <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i class="fas fa-arrow-left"></i></b>Back to Clients</button>
                            </a>
                        </div>                        
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('client.update', [$client->id]) }}" id="form-entry">
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Full name</label>
                                        <input type="text" class="form-control font-weight-light" placeholder="Enter Full Name" value="{{ $client->name }}" name="name" required>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <label>Contact Person</label>
                                        <input type="text" class="form-control font-weight-light" placeholder="Enter Conntact Person" value="{{ $client->contact_person }}" name="contact_person" required>
                                    </div>
                                </div>
                            </div>
                
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Address</label>
                                        <input type="text" class="form-control font-weight-light" placeholder="Enter Personal Address" value="{{ $client->address }}" name="address" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Official Address</label>
                                        <input type="text" class="form-control font-weight-light" placeholder="Enter official Address" value="{{ $client->official_address }}" name="official_address" required>
                                    </div>
                                </div>
                            </div>
                
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Contact official</label>
                                        <input class="form-control" type="tel" placeholder="Enter official Contact" value="{{ $client-> contact_no }}" name="   contact_no" required>
                                    </div>
                                   
                                    <div class="col-lg-6">
                                        <label>Email</label>
                                        <input type="email" readonly="readonly" class="form-control font-weight-light" placeholder="Enter Email"  value="{{ $client->email }}" name="email" required>
                                    </div>
                
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Password</label>
                                        <input class="form-control" type="password" placeholder="Enter password" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">       
                                    <div class="col-lg-6">
                                        <div class="custom-control custom-switch custom-control-danger mb-2">
                                            <input type="checkbox" class="custom-control-input" id="inactive" name="inactive" {{ $client->inactive == 1 ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="inactive">Inactive</label>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div> 
                            <div class="custom-control custom-control-right custom-switch text-right mb-2">
                                <input type="checkbox" class="custom-control-input" id="demote_client" name="demote_client">
                                <label class="custom-control-label" for="demote_client">Demote as user</label>
                            </div>
                
                            <div class="form-check form-check-right text-right">
                                <input type="checkbox" class="form-check-input" id="notify_user" name="notify_user">
                                <label class="form-check-label" for="notify_user">Notify User</label>
                            </div> 
                             <br>
                
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i class="fas fa-save"></i></b>Save</button>
                            </div>
                        </form>
                    </div>
                </div>                
            </div>
            <!-- /profile info -->

            <!-- case info -->
            <div class="tab-pane fade" id="cases-tab">
                <div class="card content-border-style">
                    <div class="card-header bg-white header-elements-inline">
                        <h6 class="card-title">Cases</h6>
                    </div>

                    <div class="card-body">
                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
                            <div class="datatable-scroll-wrap">
                                <table class="table datatable-responsive-column-controlled dataTable no-footer dtr-column" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>Case ID</th>
                                            <th>Case Name</th>
                                            <th>Case Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /case info -->

            <!-- payment info -->
            <div class="tab-pane fade" id="payment-tab">

                <!-- My inbox -->
                <div class="card content-border-style">
                    <div class="card-header bg-white header-elements-inline">
                        <h6 class="card-title">Pending Payments</h6>
                    </div>

                    <div class="card-body">
                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
                            <div class="datatable-scroll-wrap">
                                <table class="table datatable-responsive-column-controlled dataTable no-footer dtr-column" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
        							<thead>
        								<tr role="row">
                                            <th>Client</th>
                                            <th>Invoice Number</th>
                                            <th>Full Amount</th>
                                            <th>Paid Amount</th>
                                            <th>Balance</th>
                                            <th>Due Date</th>
                                            <th>Invoice</th>
                                            <th>Actions</th>
                                        </tr>
        							</thead>
        							<tbody>
                                    </tbody>
        						</table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card content-border-style">
                    <div class="card-header bg-white header-elements-inline">
                        <h6 class="card-title">Completed Payments</h6>
                    </div>

                    <div class="card-body">
                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
                            <div class="datatable-scroll-wrap">
                                <table class="table datatable-responsive-column-controlled dataTable no-footer dtr-column" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>Payment ID</th>
                                            <th>Invoive number</th>
                                            <th>Full Amount</th>
                                            <th>Paid By</th>
                                            <th>Paid Date</th>
                                            <th>Payment Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /payment info -->
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
                        window.location.href = '{{ route('client.index') }}';
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