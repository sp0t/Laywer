<div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
    <form id="form-1" class="row row-cols-1 ms-5 me-5 needs-validation" novalidate  method="post" action="javascript:void(0)" enctype="multipart/form-data">
            @csrf
        {{ csrf_field() }}
        <fieldset class="mb-3">
            <legend class="text-uppercase font-size-sm font-weight-bold border-bottom"></legend>
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Case Type </label>
                <div class="col-lg-9">
                    <div class="mb-4" >
                        <select data-placeholder="Enter 'as'" class="form-control select2" id="case_type">
                            <option data-select2-id="83"> Select case type</option>
                            @foreach($types as $typeInfo)
                            <option value="{{ $typeInfo->id }}"  @if(!empty($caseInfo->type)) @if($typeInfo->id == $caseInfo->type ) selected @endif @endif>{{ $typeInfo->name }}</option>
                            @endforeach
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
            <!-- Basic text input -->
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Case Title<span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <input type="text" name="basic" class="form-control" required="" placeholder="Case Title" name="case_title" id="case_title"  @if(!empty($caseInfo->title)) value="{{ $caseInfo->title }}" @endif >
                    <input type="hidden"  id="case_id"  @if(!empty($caseInfo->id)) value="{{ $caseInfo->id }}" @endif >
                    <div class="valid-feedback">
                        ooks good!
                    </div>
                    <div class="invalid-feedback">
                        Please enter case tile
                    </div>
                </div>
            </div>
            <!-- /basic text input -->


            <!-- Basic textarea -->
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Case description <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                    <textarea rows="5" cols="5" name="textarea" class="form-control" required="" placeholder=" Please enter case description" id="case_description">  @if(!empty($caseInfo->description)) {{ $caseInfo->description }} @endif </textarea>
                    <div class="valid-feedback">
                        ooks good!
                    </div>
                    <div class="invalid-feedback">
                        Please enter case description
                    </div>
                </div>
            </div>
            <!-- /basic textarea -->

        </fieldset>

        <fieldset class="mb-3">
            <!-- Basic select -->
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Lawyers</label>
                <div class="col-lg-9">
                    <div class="form-group">
                        
                        <select class="form-control " multiple="" id="lawyers" required>
                            <option value="">Select lawyers</option>
                            @foreach($lawyers as $typeInfo)
                            <option value="{{ $typeInfo->id }}" @foreach($CaseLawyerInfo as $lawerInfo) @if($typeInfo->id ==$lawerInfo->lawyer_id)  selected @endif @endforeach>{{ $typeInfo->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-lg-3">Clients</label>
                <div class="col-lg-9">
                    <div class="form-group">
                        <select class="form-control select2" multiple=""  id="clients" required>
                            <option value="">Select Clients</option>
                             @foreach($clients as $typeInfo)
                            <option value="{{ $typeInfo->id }}" @foreach($cleintInfo as $clientInfo) @if($typeInfo->id ==$clientInfo->customer_id)  selected @endif @endforeach>{{ $typeInfo->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
         
          
        </fieldset>
    
   </form>
    <div>
        <button type="submit" class="btn btn-primary sw-btn-next sw-btn" id="submit_data">Submit</button>
    </div>
</div>
<script type="text/javascript">
    $('#submit_data').on('click',function(e){
            e.preventDefault();
            var case_type          = $('#case_type').val();
            var case_title         = $('#case_title').val();
            var case_description   = $('#case_description').val();
            var lawyers            = $('#lawyers').val();
            var clients            = $('#clients').val();
            var case_id            = $('#case_id').val();
      
            $.ajax({
                data: {
                    type : case_type,
                    title : case_title,
                    description : case_description,
                    lawyers : lawyers,
                    clients : clients,
                    case_id : case_id,
                    _token: $("input[name='_token']").val() ,
                },
                type: "POST",
                dataType:'JSON',
                url: window.baseUrl + '/cases/add',
                success:function(data) {
                    $('#case_id').val(data.case_id);
                    $('#case_id_dcoument ').val(data.case_id);
                   
                 }
            }); 
        });

</script>