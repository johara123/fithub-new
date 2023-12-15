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
                        <h2 class="h2-title">Payment Status</h2>
                        <div class="line"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @if (Session::has('message'))
                            <center>
                                <h1 id="hideStatus" style="color: #fff">
                                    {{Session::get('message')}}
                                </h1>
                            </center>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="assets/js/jquery.min.js"></script>
<script>
$(document).ready(function () {
    window.onload = function () {
        window.setTimeout(function () {
            redirect();
        }, 2000);
    };
    function redirect() {
        window.location.href = '<?= URL::to('/') ?>';
    }
});
</script>
@endsection