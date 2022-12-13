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
        <tr  class="milestone_{{ $caseMilestoneInfo->id }}">
            <td class="sorting_1">#{{ $caseMilestoneInfo->id }}</td>

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
                    <a href="#" class="list-icons-item text-teal"><i class="icon-eye"></i></a>
                    <a href="#" class="list-icons-item text-primary"><i class="icon-pencil7"></i></a>
                    <a href=" javascript:void(0)" class="list-icons-item text-danger delete-item" onclick="deleteMilestone('{{ $caseMilestoneInfo->id }}')"><i class="icon-trash"></i></a>
                </div>
            </td>
        </tr>
        @endforeach
      
    </tbody>
</table>
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
               
                $('.success').html('<div class="alert alert-primary" role="alert">Successfull create payment data!</div>');
                $('.milestone_'+ id).hide(data);
            }
        }); 
    }

   

</script>