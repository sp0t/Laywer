@extends('layouts.app')
@section('css')
<!-- Core JS files -->
<script src="assets/global_assets/js/main/jquery.min.js"></script>
<script src="assets/global_assets/js/main/bootstrap.bundle.min.js"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script src="assets/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js"></script>
<script src="assets/global_assets/js/plugins/forms/selects/select2.min.js"></script>

<script src="assets/js/app.js"></script>
<script src="assets/global_assets/js/demo_pages/form_select2.js"></script>
<!-- /theme JS files -->
<!-- Theme JS files -->
<script src="assets/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script src="assets/global_assets/js/plugins/tables/datatables/extensions/natural_sort.js"></script>

<script src="assets/js/app.js"></script>
<script src="assets/global_assets/js/demo_pages/task_manager_list.js"></script>
<!-- /theme JS files -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Animate CSS for the css animation support if needed -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />


@endsection
@section('dashname')
<div class="page-header page-header-light">
    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="/" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active"> <a href="/addnewcase" class="breadcrumb-item">Cases</a> / Add New Case</span>
            </div>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <div class="breadcrumb-elements-item dropdown p-0"> </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <!-- Include SmartWizard CSS -->
    <link href="{{ URL::asset( 'dist/css/demo.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset( 'dist/css/smart_wizard_all.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <br>
    <div class="container">
        <!-- SmartWizard html -->
        <div id="smartwizard" dir="rtl-">
            <ul class="nav nav-progress">
                <li class="nav-item">
                  <a class="nav-link" href="#step-1">
                    <!-- <div class="num">1</div> -->
                     Case Details
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#step-2">
                    <!-- <span class="num">2</span> -->
                        Milestone
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#step-3">
                        <!-- <span class="num">3</span> -->
                        Payments
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#step-4">
                        <!-- <span class="num">4</span> -->
                        Document
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                @include('cases.case_details')
                @include('cases.milestone')
                @include('cases.payments')
                <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                    <form id="form-4" class="row row-cols-1 ms-5 me-5 needs-validation" novalidate>
                        <div class="phppot-container">
                            <div id="drop-area">
                                <h3 class="drop-text">Drop images here to upload</h3>
                            </div>
                            <div id="loader-icon">
                                <img src="loader.gif" />
                            </div>
                            <div id="success-message-info" class="message success display-none"></div>
                        </div>
                    </form>  
                </div>
            </div>

            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>


        <br /> &nbsp;
    </div>

    <!-- Confirm Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Order Placed</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Congratulations! Your order is placed.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="closeModal()">Ok, close and reset</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootrap for the demo page -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- jQuery Slim 3.6  -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script> -->

    <!-- Include SmartWizard JavaScript source -->
    <script type="text/javascript" src="{{ URL::asset( 'dist/js/jquery.smartWizard.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset( 'dist/js/demo.js') }}"></script>
    <script src="{{ URL::asset( 'assets/js/select2.min.js') }}" type="text/javascript"></script>
  
<style>

#drop-area {
    border-style: dotted;
    min-height: 200px;
    padding: 10px;
    border-color: #999;
    border-radius: 15px;
    stroke-width: 1px;
    margin-bottom: 15px;
}

h3.drop-text {
    color: #999;
    text-align: center;
    font-size: 2em;
}

#loader-icon {
    display: none;
}

#success-message-info {
    text-align: center;
}
</style>
<script>
$(document).ready(function() {
    $("#drop-area").on('dragenter', function (e){
    e.preventDefault();
    });

    $("#drop-area").on('dragover', function (e){
    e.preventDefault();
    });

    $("#drop-area").on('drop', function (e){
    e.preventDefault();
    var image = e.originalEvent.dataTransfer.files;
    createFormData(image);
    });
});

function createFormData(image) {
    var formImage = new FormData();
    formImage.append('userImage', image[0]);
    uploadFormData(formImage);
}

function uploadFormData(formData) {
    $('#loader-icon').show();
    $.ajax({
        url: "upload-ajax.php",
        type: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            $('#drop-area').append(data);
            $('#loader-icon').hide()
            $('#success-message-info').html("Added Successfully");
            $('#success-message-info').css("display", "inline-block");
        }
    });
}
</script>      
    <script type="text/javascript">
        const myModal = new bootstrap.Modal(document.getElementById('confirmModal'));
        function onCancel() { 
          // Reset wizard
          $('#smartwizard').smartWizard("reset");

          // Reset form
          // document.getElementById("form-1").reset();
          // document.getElementById("form-2").reset();
          // document.getElementById("form-3").reset();
          // document.getElementById("form-4").reset();
        }

        function onConfirm() {
          let form = document.getElementById('form-4');
          if (form) {
            if (!form.checkValidity()) {
              form.classList.add('was-validated');
              $('#smartwizard').smartWizard("setState", [3], 'error');
              $("#smartwizard").smartWizard('fixHeight');
              return false;
            }
            
            $('#smartwizard').smartWizard("unsetState", [3], 'error');
            myModal.show();
          }
        }

        function closeModal() {
          // Reset wizard
          $('#smartwizard').smartWizard("reset");

          // Reset form
          document.getElementById("form-1").reset();
          document.getElementById("form-2").reset();
          document.getElementById("form-3").reset();
          document.getElementById("form-4").reset();

          myModal.hide();
        }

        function showConfirm() {
          const name = $('#first-name').val() + ' ' + $('#last-name').val();
          const products = $('#sel-products').val();
          const shipping = $('#address').val() + ' ' + $('#state').val() + ' ' + $('#zip').val();
          let html = `
                  <div class="row">
                    <div class="col">
                      <h4 class="mb-3-">Customer Details</h4>
                      <hr class="my-2">
                      <div class="row g-3 align-items-center">
                        <div class="col-auto">
                          <label class="col-form-label">Name</label>
                        </div>
                        <div class="col-auto">
                          <span class="form-text-">${name}</span>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <h4 class="mt-3-">Shipping</h4>
                      <hr class="my-2">
                      <div class="row g-3 align-items-center">
                        <div class="col-auto">
                          <span class="form-text-">${shipping}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  
        
                  <h4 class="mt-3">Products</h4>
                  <hr class="my-2">
                  <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <span class="form-text-">${products}</span>
                    </div>
                  </div>

                  `;
          $("#order-details").html(html);
          $('#smartwizard').smartWizard("fixHeight"); 
        }

        $(function() {
            // Leave step event is used for validating the forms
            $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIdx, nextStepIdx, stepDirection) {
                // Validate only on forward movement  
                if (stepDirection == 'forward') {
                  let form = document.getElementById('form-' + (currentStepIdx + 1));
                  if (form) {
                    if (!form.checkValidity()) {
                      form.classList.add('was-validated');
                      $('#smartwizard').smartWizard("setState", [currentStepIdx], 'error');
                      $("#smartwizard").smartWizard('fixHeight');
                      return false;
                    }
                    $('#smartwizard').smartWizard("unsetState", [currentStepIdx], 'error');
                  }
                }
            });

            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepIndex, stepDirection, stepPosition) {
                $("#prev-btn").removeClass('disabled').prop('disabled', false);
                $("#next-btn").removeClass('disabled').prop('disabled', false);
                if(stepPosition === 'first') {
                    $("#prev-btn").addClass('disabled').prop('disabled', true);
                } else if(stepPosition === 'last') {
                    $("#next-btn").addClass('disabled').prop('disabled', true);
                } else {
                    $("#prev-btn").removeClass('disabled').prop('disabled', false);
                    $("#next-btn").removeClass('disabled').prop('disabled', false);
                }

                // Get step info from Smart Wizard
                let stepInfo = $('#smartwizard').smartWizard("getStepInfo");
                $("#sw-current-step").text(stepInfo.currentStep + 1);
                $("#sw-total-step").text(stepInfo.totalSteps);

                if (stepPosition == 'last') {
                  showConfirm();
                  $("#btnFinish").prop('disabled', false);
                } else {
                  $("#btnFinish").prop('disabled', true);
                }

                // Focus first name
                if (stepIndex == 1) {
                  setTimeout(() => {
                    $('#first-name').focus();
                  }, 0);
                }
            });

            // Smart Wizard
            $('#smartwizard').smartWizard({
                selected: 0,
                // autoAdjustHeight: false,
                theme: 'arrows', // basic, arrows, square, round, dots
                transition: {
                  animation:'none'
                },
                toolbar: {
                  showNextButton: false, // show/hide a Next button
                  showPreviousButton: false, // show/hide a Previous button
                  position: 'bottom'
                },
                anchor: {
                    enableNavigation: true, // Enable/Disable anchor navigation 
                    enableNavigationAlways: false, // Activates all anchors clickable always
                    enableDoneState: true, // Add done state on visited steps
                    markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                    unDoneOnBackNavigation: true, // While navigate back, done state will be cleared
                    enableDoneStateNavigation: true // Enable/Disable the done state navigation
                },
            });

            $("#state_selector").on("change", function() {
                $('#smartwizard').smartWizard("setState", [$('#step_to_style').val()], $(this).val(), !$('#is_reset').prop("checked"));
                return true;
            });

            $("#style_selector").on("change", function() {
                $('#smartwizard').smartWizard("setStyle", [$('#step_to_style').val()], $(this).val(), !$('#is_reset').prop("checked"));
                return true;
            });

        });
    </script>
@endsection
@section('footer')
<div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
    <div class="text-center d-lg-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
            <i class="icon-unfold mr-2"></i>
            Footer
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-footer">
        

        <ul class="navbar-nav ml-lg-auto">
            
            <li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-black"><i class="icon-circle mr-2"></i>by syncbridge</span></a></li>
        </ul>
    </div>
</div>
@endsection