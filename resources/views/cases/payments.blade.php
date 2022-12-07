<div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
    <form id="form-3" class="row row-cols-1 ms-5 me-5 needs-validation" novalidate>
        @csrf
        <div class="d-flex justify-content-end align-items-center">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 20%;">
                                <div class="d-flex justify-content-end align-items-center">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_default2">Create Payment <i class="icon-play3 ml-2"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="modal_default2" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>

                        <div class="modal-body">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Payment By</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="payment_by" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Remark<span class="text-danger"></span></label>
                                <div class="col-lg-10">
                                    <textarea rows="5" cols="5" name="textarea" class="form-control" placeholder="Default textarea" id="remark"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Amount</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="amount"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Due Date</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="date" name="date"  id="paid_date"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Payment status  </label>
                                <div class="col-lg-10">
                                    <div class="mb-4" data-select2-id="189">
                                        <select data-placeholder="Enter 'as'" class="form-control select2" id="payment_type">
                                            <option value=""> Select Payment status</option>
                                            <option value="0">Pending</option>
                                            <option value="1">Completed</option>
                                            <option value="3">In-transit</option>
                                            <option value="4">Failed</option>
                                        </select>
                                        <div class="valid-feedback">
                                            ooks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please select case type
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2"> <span class="text-danger"></span></label>
                                <div class="col-lg-9">
                                    <div class="col-lg-10">
                                        <label class="custom-control custom-switch" style="margin-right: 60px;">
                                            <input type="checkbox" class="custom-control-input" name="switch_single" required="" checked />
                                            <span class="custom-control-label">Partial Paymnets Allow</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="paymentChange">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <br />
        </div>
        <div class="success"></div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                <li class="nav-item">
                    <a href="#justified-icon-only-tab1" class="nav-link active" data-toggle="tab">
                        <i>Pending Paymnets</i>
                        <span class="d-lg-none ml-2">Active</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#justified-icon-only-tab2" class="nav-link" data-toggle="tab">
                        <i>Completed Payments</i>
                        <span class="d-lg-none ml-2">Inactive</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade active show" id="justified-icon-only-tab1">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">Pending Payments</h6>
                        </div>

                        <div class="card-body">
                            <div class="my-schedule"></div>
                            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
                                
                                <div class="datatable-scroll-wrap">
                                    <table class="table datatable-responsive-column-controlled dataTable no-footer dtr-column" id="DataTables_Table_1">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting">Case ID</th>
                                                <th class="sorting">Client</th>
                                                <th class="sorting">Invoice Number</th>
                                                <th class="sorting">Full Amount</th>
                                                <th class="sorting">Paid Amount</th>
                                                <th class="sorting">Balance</th>
                                                <th class="sorting">Due Date</th>
                                                <th class="sorting">Invoice</th>
                                                <th class="text-center sorting_disabled">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pendingPayment as $paymentInfo)
                                                <tr class="odd">
                                                    <td>{{ $paymentInfo->case_id }}</td>
                                                    <td>{{ $paymentInfo->case_id }}</td>
                                                    <td>{{ $paymentInfo->invoice_number }}</td>
                                                    <td>{{ $paymentInfo->amount }}</td>
                                                    <td>{{ $paymentInfo->amount }}</td>
                                                    <td>{{ $paymentInfo->amount }}</td>
                                                    <td><a href="#">{{ $paymentInfo->date }}</a></td>
                                                    <td><a href="#">{{ $paymentInfo->date }}</a></td>
                                                    <td style="">
                                                        <div class="list-icons">
                                                            <a href="#" class="list-icons-item text-teal"><i class="icon-eye"></i></a>
                                                            <a href="#" class="list-icons-item text-primary"><i class="icon-pencil7"></i></a>
                                                            <a href="#" class="list-icons-item text-danger"><i class="icon-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary sw-btn-next sw-btn">Next</button>
                       
                </div>

                <div class="tab-pane fade" id="justified-icon-only-tab2">
                    <div id="div5" class="target">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">Completed Payments</h6>
                            </div>

                            <div class="card-body">
                                <div class="my-schedule"></div>
                                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
                              
                                    <div class="datatable-scroll-wrap">
                                        <table class="table datatable-responsive-column-controlled dataTable no-footer dtr-column" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc">
                                                        Payment ID
                                                    </th>
                                                    <th class="sorting">Invoive number</th>
                                                    <th class="sorting">Full Amount</th>
                                                    <th class="sorting">Paid By</th>
                                                    <th class="sorting">Paid Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pendingPayment as $paymentInfo)
                                                    <tr class="odd">
                                                     
                                                        <td>{{ $paymentInfo->invoice_number }}</td>
                                                        <td>{{ $paymentInfo->amount }}</td>
                                                        <td>{{ $paymentInfo->amount }}</td>
                                                         <td><a href="#">{{ $paymentInfo->payment_by }}</a></td>
                                                        <td><a href="#">{{ $paymentInfo->date }}</a></td>
                                                       
                                                       
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $('#paymentChange').on('click',function(e){
        e.preventDefault();
        var payment_by    = $('#payment_by').val();
        var remark        = $('#remark').val();
        var amount        = $('#amount').val();
        var date          = $('#paid_date').val();
        var payment_type  = $('#payment_type').val();
        var case_id       = $('#case_id').val();

        $.ajax({
            data: {
                payment_by : payment_by,
                remark : remark,
                amount : amount,
                date : date,
                payment_type : payment_type,
                case_id : case_id,
                _token: $("input[name='_token']").val() ,
            },
            type: "POST",
            url: window.baseUrl + '/case/payment',
            success:function(data) {
                if(data == 200) {
                    $('#modal_default2').modal().hide();;
                    $('.modal-backdrop').modal().hide();;
                      $('.success').html('<div class="alert alert-primary" role="alert">Successfull create payment data!</div>');
                }
                
             
             }
        }); 
    });

</script>