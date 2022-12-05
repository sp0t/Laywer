<form id="form-entry-modal" method="POST" action="{{ is_null($item) ? route('case.milestones.save', [$id]) : route('case.milestones.update', [$id, $milestone]) }}">    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal-content">
        <div class="modal-header">
            @if((isset($view) && $view == false) || !isset($view))
                <h5 class="modal-title"><i class="icon-medal2 mr-2"></i> &nbsp;Add/Edit New Milestone</h5>
            @else
                <h5 class="modal-title"><i class="icon-medal2 mr-2"></i> &nbsp;View Milestone</h5>
            @endif
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            
                <hr>

                <div class="form-group row">
                        <label class="col-form-label col-lg-3">Milestone Title</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="title" value="{{ is_null($item) ? '' : $item->title }}" required {{ isset($view) && $view ? 'disabled' : '' }}>
                        </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Date</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="date" name="date" value="{{ is_null($item) ? '' : $item->target_date }}" required {{ isset($view) && $view ? 'disabled' : '' }}>
                        
                    </div>
                </div>                

                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Case description <span class="text-danger"></span></label>
                    <div class="col-lg-9">
                        <textarea rows="5" cols="5" name="description" class="form-control" required {{ isset($view) && $view ? 'disabled' : '' }}>{{ is_null($item) ? '' : $item->description }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Satus</label>
                    <div class="col-lg-9">
                        {!! Form::select('status', $milestone_status, (is_null($item) ? '' : $item->status), array('class' => 'form-control select', 'id' => 'status', 'required', (isset($view) && $view ? 'disabled' : ''))); !!}
                    </div>
                </div> 

                <hr>               
            
        </div>

        <div class="modal-footer">
            <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Close</button>
            @if((isset($view) && $view == false) || !isset($view))
                <button class="btn btn-primary milestone-submit"><i class="icon-checkmark3 font-size-base mr-1"></i> Save</button>
            @endif
        </div>
    </div>
</form>