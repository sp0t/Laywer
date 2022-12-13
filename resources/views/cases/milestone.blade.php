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
    
        <div id="modalMileStone" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Title</label>
                            <div class="col-lg-10">
                               <span id="title_view"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Descraption</label>
                            <div class="col-lg-10">
                                <span id="descraption_view"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Date</label>
                            <div class="col-lg-10">
                                 <span id="date_view"></span>
                            </div>
                        </div>
                      
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @foreach($caseMilestone as $caseMilestoneInfo)
        <div id="modalMileStoneEdit_{{ $caseMilestoneInfo->id }}" class="modal fade mile_stone_data" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                   
                    <div class="modal-body">
                        <form id="form-2" class="row row-cols-1 ms-5 me-5 needs-validation" novalidate method="post" action="javascript:void(0)" enctype="multipart/form-data">
                           @csrf
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Milestone Title</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="edit_milestone_title" value="{{ $caseMilestoneInfo->title }}" />
                                    <input type="hidden" id="edit_id" value="{{ $caseMilestoneInfo->id }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Date</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="date" name="edit_mdate"  id="edit_date"  value="{{ $caseMilestoneInfo->target_date }}"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Milestone description <span class="text-danger"></span></label>
                                <div class="col-lg-10">
                                    <textarea rows="5" cols="5" name="edit_mtextarea" class="form-control"  placeholder="Default textarea" id="edit_milestone_descraption">  {{ $caseMilestoneInfo->description }}</textarea>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td style="width: 20%;">
                                                <div class="d-flex justify-content-end align-items-center">
                                                    <button type="button" class="btn btn-primary" id="updateMilstone">Update <i class="icon-play3 ml-2"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
      
        <div class="success_milestone"></div>
        <div  class="dataTables_wrapper no-footer">
            <div class="result_mile_stone">
                <table class="table tasks-list table-lg dataTable no-footer" >
                    <thead>
                        <tr role="row">
                            <th>#</th>
                            <th>Milestone Title/Description</th>
                            <th>Due Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($caseMilestone as $caseMilestoneInfo)
                        <tr class="milestone_{{ $caseMilestoneInfo->id }}">
                            <td>#{{ $caseMilestoneInfo->id }}</td>
                            <td>
                                <div class="font-weight-semibold">
                                    <a href="#">{{ $caseMilestoneInfo->title }}</a>
                                </div>
                                <div class="text-muted">{{ $caseMilestoneInfo->description }}</div>
                            </td>

                            <td>
                                <div class="d-inline-flex align-items-center">
                                    <i class="icon-calendar2 mr-2"></i>
                                   {{ $caseMilestoneInfo->target_date }}
                                </div>
                            </td>
                            <td>
                                <div class="list-icons">
                                    <a href="javascript:void(0)" class="list-icons-item text-teal" data-toggle="modal" data-target="#modalMileStone" onclick="milestoneModalView('{{ $caseMilestoneInfo->title }}','{{ $caseMilestoneInfo->description }}','{{ $caseMilestoneInfo->target_date }}')"><i class="icon-eye"></i></a>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#modalMileStoneEdit_{{ $caseMilestoneInfo->id }}" class="list-icons-item text-primary"><i class="icon-pencil7"></i></a>
                                    <a href="javascript:void(0)" class="list-icons-item text-danger delete-item" onclick="deleteMilestone('{{ $caseMilestoneInfo->id }}')"><i class="icon-trash"></i></a>
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
    
    function deleteMilestone(id) {
        $.ajax({
            data: {
                id : id,
                _token: $("input[name='_token']").val() ,
            },
            type: "POST",
            url: window.baseUrl + '/case/milestone/delete',
            success:function(data) {
               $('.milestone_'+ id).hide(data);
             }
        }); 
    }

    function milestoneModalView(title, descraption, date) {

            $('#title_view').html(title);
            $('#descraption_view').html(descraption);
            $('#date_view').html(date);
    }
    

    $('#addMewMileStone').on('click',function(e){
        e.preventDefault();
        var milestone_title         = $('#milestone_title').val();
        var date                    = $('#date').val();
        var milestone_descraption   = $('#milestone_descraption').val();
        var case_id   = $('#case_id').val();

        $.ajax({
            data: {
                milestone_title : milestone_title,
                milestone_descraption : milestone_descraption,
                date : date,
                case_id : case_id,
                _token: $("input[name='_token']").val() ,
            },
            type: "POST",
            url: window.baseUrl + '/milestone',
            success:function(data) {
               $('.result_mile_stone').html(data);
             }
        }); 
    });
    $('#updateMilstone').on('click',function(e){
        e.preventDefault();
        var milestone_title         = $('#edit_milestone_title').val();
        var date                    = $('#edit_date').val();
        var milestone_descraption   = $('#edit_milestone_descraption').val();
        var id                      = $('#edit_id').val();
        var case_id   = $('#case_id').val();

        $.ajax({
            data: {
                milestone_title : milestone_title,
                milestone_descraption : milestone_descraption,
                date : date,
                id : id,
                 case_id : case_id,
                _token: $("input[name='_token']").val() ,
            },
            type: "POST",
            url: window.baseUrl + '/milestone/update/' +id ,
            success:function(data) {
                 $('.success_milestone').html('<div class="alert alert-primary" role="alert">Successfull update milestone!</div>');
                $('.mile_stone_data').modal().hide();
                $('.modal-backdrop').modal().hide();
                $('.result_mile_stone').html(data);
             }
        }); 
    });

</script>