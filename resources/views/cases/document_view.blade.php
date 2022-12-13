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
