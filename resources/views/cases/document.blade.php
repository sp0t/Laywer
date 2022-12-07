<div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
   <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open([ 'route' => [ 'dropzone.store' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!}
                <div class="drag-and-drop-division">
                    <h3 class="drag-and-drop">Drag and drop</h3>
                    <i class="fa fa-upload" aria-hidden="true"></i>
                </div>

                    <input type="hidden" id="case_id_dcoument" @if(!empty($caseInfo->id)) value="{{ $caseInfo->id }}" @endif name="case_id_dcoument">
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @csrf
       {{ csrf_field() }}
    <div class="document_list" id="resultOfDocument">
       <table class="table">
            <thead>
                <td colspan="4"> Cause Papers</td>
                <td> Allow Client/ Customer view</td>
            </thead>
            <tbody>
                @foreach($documentList as $documentInfo)

                <tr class="document_{{ $documentInfo->id }}">

                    <td>{{ $documentInfo->document_name }} </td>
                    <td>{{ $documentInfo->date }} </td>
                    <td>{{ $documentInfo->userName }} </td>
                    <td>{{ $documentInfo->created_at }} </td>
                    <td> <input type="checkbox" id="html" name="fav_language" value="1"> </td>

                    <td> 
                        <div class="list-icons">
                            <!-- <a href="" class="list-icons-item text-teal"><i class="icon-eye"></i></a> -->
                          
                            <a href=" javascript:void(0)" class="list-icons-item text-danger delete-item" onclick="deleteDocument('{{ $documentInfo->id }}')"><i class="icon-trash"></i></a>
                            
                            <a href="{{ URL::asset( 'images/'. $documentInfo->document_name) }}" class="list-icons-item text-teal" download>
                                <i class="icon-download"></i>
                            </a>
                      
                        </div>
                    </td>
                </tr>
                @endforeach
          </tbody>
        </table>
     
    </div>
    <div>
        <button type="submit" class="btn btn-primary sw-btn-next sw-btn" id="submit_data">Submit</button>
    </div>
</div>

<script type="text/javascript">

    function deleteDocument(id) {
        $.ajax({
            data: {
                id : id,
                _token: $("input[name='_token']").val() ,
            },
            type: "POST",
            url: window.baseUrl + '/case/documents/delete',
            success:function(data) {
               $('.document_'+ id).hide(data);
             }
        }); 
    }



</script>