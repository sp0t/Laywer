<style>
    .dataTables_wrapper.no-footer {
        width: 100%;
    }
    .result_mile_stone {
        width: 100%;
        display: block;
        float: left;
    }
</style>
<div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
    <form id="form-2" class="row row-cols-1 ms-5 me-5 needs-validation" novalidate method="post" action="javascript:void(0)" enctype="multipart/form-data">
       @csrf
        <div class="form-group row">
            <label class="col-form-label col-lg-2">Milestone Title</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="milestone_title" />
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-2">Date</label>
            <div class="col-lg-10">
                <input class="form-control" type="date" name="date"  id="date"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-2">Milestone description <span class="text-danger"></span></label>
            <div class="col-lg-10">
                <textarea rows="5" cols="5" name="textarea" class="form-control"  placeholder="Default textarea" id="milestone_descraption"></textarea>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td style="width: 20%;">
                            <div class="d-flex justify-content-end align-items-center">
                                <button type="button" class="btn btn-primary" id="addMewMileStone">Add New Milestone <i class="icon-play3 ml-2"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
      
        <div  class="dataTables_wrapper no-footer">
            <div class="result_mile_stone">
                <table class="table tasks-list table-lg dataTable no-footer" >
                    <thead>
                        <tr role="row">
                            <th>#</th>
                            <th>Milestone Title/Description</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($caseMilestone as $caseMilestoneInfo)
                        <tr class="odd">
                            <td class="sorting_1">#{{ $caseMilestoneInfo->id }}</td>

                            <td>
                                <div class="font-weight-semibold"><a href="task_manager_detailed.html">{{ $caseMilestoneInfo->title }}</a></div>
                                <div class="text-muted">{{ $caseMilestoneInfo->description }}</div>
                            </td>

                            <td>
                                <div class="d-inline-flex align-items-center">
                                    <i class="icon-calendar2 mr-2"></i>
                                   {{ $caseMilestoneInfo->target_date }}
                                </div>
                            </td>
                            <td>
                                <select name="status" class="custom-select">
                                    <option value="open">Open</option>
                                    <option value="hold">On hold</option>
                                    <option value="resolved" selected="selected">Resolved</option>
                                    <option value="dublicate">Dublicate</option>
                                    <option value="invalid">Invalid</option>
                                    <option value="wontfix">Wontfix</option>
                                    <option value="closed">Closed</option>
                                </select>
                            </td>
                           
                            <td>
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

        <br />
        <div class="d-flex justify-content-end align-items-center">
            <button type="submit" class="btn btn-primary ml-3 sw-btn-next sw-btn">Save</button>
        </div>
    </form>

</div>

<script type="text/javascript">
    $('#addMewMileStone').on('click',function(e){
        e.preventDefault();
        var milestone_title    = $('#milestone_title').val();
        var date               = $('#date').val();
        var milestone_descraption               = $('#milestone_descraption').val();

        $.ajax({
            data: {
                milestone_title : milestone_title,
                milestone_descraption : milestone_descraption,
                date : date,
                _token: $("input[name='_token']").val() ,
            },
            type: "POST",
            url: window.baseUrl + '/milestone',
            success:function(data) {
               $('.result_mile_stone').html(data);
             }
        }); 
    });

</script>