@extends('website.layout')
@section('content_website')
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
</svg>
<!-- About -->
<div class="pb-2">
    <h1 class="title title--h1 title__separate">Contact</h1>
</div>

<!-- Contact -->
<div class="map" id="map">
    <div style="overflow:hidden;max-width:100%;width:100%;height:100%;">
        <div id="embed-ded-map-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=District+9,+Ho+Chi+Minh+City,+Vietnam&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div>
        <style>
            #embed-ded-map-canvas img.text-marker {
                max-width: none !important;
                background: none !important;
            }

            img {
                max-width: none
            }

        </style>
    </div>
</div>
<h2 class="title title--h3">Contact Form</h2>

<form id="form_contact_id" class="contact-form" method="POST" data-toggle="validator">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-12 col-md6">
            <div id="alert-danger" class="alert alert-danger d-flex align-items-center" role="alert" style="display: none !important;">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" /></svg>
                <div id="danger-msg" style="margin-left: 5px; margin-top: 5px;">A simple danger alert—check it out!
                </div>
            </div>
            <div id="alert-success" class="alert alert-success d-flex align-items-center" role="alert" style="display: none!important;">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" /></svg>
                <div id="success-msg" style="margin-left: 5px; margin-top: 5px;">A simple success alert—check it out!
                </div>
            </div>
        </div>

        <div class="form-group col-12 col-md-6">
            <i class="font-icon icon-user"></i>
            <input type="text" class="input input__icon form-control" id="nameContact" name="nameContact" placeholder="Full name" required="required" autocomplete="on" oninvalid="setCustomValidity('Fill in the field')" onkeyup="setCustomValidity('')">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-12 col-md-6">
            <i class="font-icon icon-envelope"></i>
            <input type="email" class="input input__icon form-control" id="emailContact" name="emailContact" placeholder="Email address" required="required" autocomplete="on" oninvalid="setCustomValidity('Email is incorrect')" onkeyup="setCustomValidity('')">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-12 col-md-12">
            <textarea class="textarea form-control" id="messageContact" name="messageContact" placeholder="Your Message" rows="4" required="required" oninvalid="setCustomValidity('Fill in the field')" onkeyup="setCustomValidity('')"></textarea>
            <div class="help-block with-errors"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 order-2 order-md-1 text-center text-md-left">
            <div id="validator-contact" class="hidden"></div>
        </div>
        <div class="col-12 col-md-6 order-1 order-md-2 text-right">
            <button onclick="sendContact()" type="button" class="btn"><i class="font-icon icon-send"></i> Send
                Message</button>
        </div>
    </div>
</form>
@endsection
@section('css_website')
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{asset('backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

@endsection

@section('js_website')
<!-- SweetAlert2 -->
<script src="{{asset('backend/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

<script>
    var Toast = Swal.mixin({
        toast: true
        , position: 'top-end'
        , showConfirmButton: false
        , timer: 5000
    });

    function sendContact() {
        $("#alert-success").hide();
        $("#alert-danger").hide();
        let URL = "{{ URL::to('/send-contact') }}";
        $.ajax({
            type: "POST"
            , url: URL
            , data: $("#form_contact_id").serialize()
            , dataType: 'json'
            , success: function(json) {
                if (!json.error) {
                    Toast.fire({
                        icon: 'success'
                        , title: json.msg
                    });
                    $("#success-msg").html(json.msg);
                    $("#alert-success").show();
                } else {
                    Toast.fire({
                        icon: 'error'
                        , title: json.msg
                    })
                    $("#danger-msg").html(json.msg);
                    $("#alert-danger").show();

                }
            }
        })
    }

</script>
@endsection
