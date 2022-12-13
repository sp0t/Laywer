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

    <div class="tab-content tabe_data_content" style="height: 500px;">
        <div class="tab-pane fade active show" id="justified-icon-only-tab1">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Pending Payments</h6>
                </div>

                <div class="card-body">
                    <div class="my-schedule"></div>
                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
                        
                        <div class="datatable-scroll-wrap">
                            <table class="table datatable-responsive-column-controlled dataTable no-footer dtr-column" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                                <thead>
                                    <tr role="row">
                                        <th>Payment ID</th>
                                        <th>Invoice No</th>
                                        <th>Total amount</th>
                                        <th>Paid Amount</th>
                                        <th>Balance</th>
                                        <th>Last payment date</th>
                                        <th>Due Date</th>
                                        <th>Invoice</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pendingPayment as $paymentInfo)
                                        <tr class="payment_{{ $paymentInfo->id }}">
                                            <td>{{ $paymentInfo->invoice_number }}</td>
                                            <td>{{ $paymentInfo->invoice_number }}</td>
                                            <td>{{ $paymentInfo->amount }}</td>
                                            <td>{{ $paymentInfo->amount }}</td>
                                            <td>{{ $paymentInfo->amount }}</td>
                                            <td><a href="#">{{ $paymentInfo->date }}</a></td>
                                            <td><a href="#">{{ $paymentInfo->date }}</a></td>
                                            <td><a href="#">{{ $paymentInfo->date }}</a></td>
                                            <td>
                                                <div class="list-icons">
                                                    <!-- <a href="#" class="list-icons-item text-teal">
                                                        <i class="icon-eye"></i>
                                                    </a>
                                                    <a href="#" class="list-icons-item text-primary">
                                                        <i class="icon-pencil7"></i>
                                                    </a> -->
                                                    <a href=" javascript:void(0)" class="list-icons-item text-danger delete-item" onclick="deletepayment('{{ $paymentInfo->id }}')">
                                                        <i class="icon-trash"></i>
                                                    </a>
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
                                            <th>Payment ID</th>
                                            <th>Remarks</th>
                                            <th>Amount</th>
                                            <th>Paid By</th>
                                            <th>Paid Date</th>
                                            <th>Payment type</th>
                                            <th>Action</th>
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
                                                <td><a href="#">{{ $paymentInfo->date }}</a></td>
                                                <td>
                                                    <div class="list-icons">
                                                        <a href="#" class="list-icons-item text-teal">
                                                            <i class="icon-eye"></i>
                                                        </a>
                                                        <a href="#" class="list-icons-item text-primary">
                                                            <i class="icon-pencil7"></i>
                                                        </a>
                                                        <a href=" javascript:void(0)" class="list-icons-item text-danger delete-item" onclick="deletepayment('{{ $paymentInfo->id }}')">
                                                            <i class="icon-trash"></i>
                                                        </a>
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
            </div>
        </div>
    </div>
</div>