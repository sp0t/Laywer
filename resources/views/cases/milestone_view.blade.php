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
