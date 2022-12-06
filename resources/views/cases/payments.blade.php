<div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
    <form id="form-3" class="row row-cols-1 ms-5 me-5 needs-validation" novalidate>
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
                                    <input type="text" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Remark<span class="text-danger"></span></label>
                                <div class="col-lg-10">
                                    <textarea rows="5" cols="5" name="textarea" class="form-control" required="" placeholder="Default textarea"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Amount</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Due Date</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="date" name="date" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Select Invoice</label>
                                <div class="col-lg-10">
                                    <input type="file" class="form-control h-auto" />
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
                                    <table class="table datatable-responsive-column-controlled dataTable no-footer dtr-column" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="control sorting_disabled"></th>
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
                                            <tr class="odd">
                                                <td>001</td>
                                                <td>Cristina</td>
                                                <td style="">5074.2019</td>
                                                <td>LKR . 20,000.00</td>
                                                <td>LKR . 10,000.00</td>
                                                <td>LKR . 10,000.00</td>
                                                <td>08/25/2022</td>
                                                <td><a href="#">Download</a></td>
                                                <td style="">
                                                    <div class="list-icons">
                                                        <a href="#" class="list-icons-item text-teal"><i class="icon-eye"></i></a>
                                                        <a href="#" class="list-icons-item text-primary"><i class="icon-pencil7"></i></a>
                                                        <a href="#" class="list-icons-item text-danger"><i class="icon-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <
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
                                                    <th class="sorting sorting_asc">
                                                        Payment ID
                                                    </th>
                                                    <th class="sorting">Invoive number</th>
                                                    <th class="sorting">Full Amount</th>
                                                    <th class="sorting">Paid By</th>
                                                    <th class="sorting">Paid Date</th>
                                                    <th class="sorting">Payment Type</th>
                                                    <th class="sorting">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">PAY-001</td>

                                                    <td style="">5074.2019</td>
                                                    <td>1505200.00</td>
                                                    <td>Cristina Galliani</td>
                                                    <td>2019-12-19</td>
                                                    <td>online payment</td>

                                                    <td style="">
                                                        <div class="list-icons">
                                                            <a href="#" class="list-icons-item text-teal"><i class="icon-eye"></i></a>
                                                            <a href="#" class="list-icons-item text-primary"><i class="icon-pencil7"></i></a>
                                                            <a href="#" class="list-icons-item text-danger"><i class="icon-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="datatable-footer">
                                        <div class="dataTables_info" id="DataTables_Table_1_info" role="status" aria-live="polite">Showing 1 to 10 of 15 entries</div>
                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
                                            <a class="paginate_button previous disabled" aria-controls="DataTables_Table_1" data-dt-idx="0" tabindex="-1" id="DataTables_Table_1_previous">←</a>
                                            <span>
                                                <a class="paginate_button current" aria-controls="DataTables_Table_1" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button" aria-controls="DataTables_Table_1" data-dt-idx="2" tabindex="0">2</a>
                                            </span>
                                            <a class="paginate_button next" aria-controls="DataTables_Table_1" data-dt-idx="3" tabindex="0" id="DataTables_Table_1_next">→</a>
                                        </div>
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