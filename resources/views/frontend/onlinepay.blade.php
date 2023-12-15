@extends('layouts.index')
@section('content')
@section('title',$title)
<style>
    #registration {
        padding: 0px 0px 140px 0px;
        background-image: url(./images/registration.jpg);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<section class="main-contact-in" id="contactus"><br>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="appointment-bg wow fadeInRight" data-wow-delay=".5s">
                    <div class="appointment-title">
                        <h2 class="h2-title">Online Payment</h2>
                        <div class="line"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-box">
                                <input type="text" class="form-input" value="<?= Session::get('package') ?>" readonly="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-box">
                                <input type="text" id="collectamount" class="form-input" value="<?= Session::get('packageamt') ?>" readonly="">
                            </div>
                        </div>
                    </div>
                    <center>
                        <button type="button" class="sec-btn" id="sslczPayBtn"
                                token="if you have any token validation"
                                postdata="your javascript arrays or objects which requires in backend"
                                order="If you already have the transaction generated for current order"
                                endpoint="{{ URL::to('/pay-via-ajax') }}"> <i class="fa fa-paypal"></i> Pay Now
                        </button>
                    </center>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="assets/js/jquery.min.js"></script>
<script>
var obj = {};
obj.amount = $('#collectamount').val();
$('#sslczPayBtn').prop('postdata', obj);
(function (window, document) {
    var loader = function () {
        var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
        script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
        tag.parentNode.insertBefore(script, tag);
    };
    window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
})(window, document);
</script>
@endsection