@extends('layouts.index')
@section('content')
@section('title',$title)
<style>
    .main_banner {
        position: relative;
    }

    #bg-video {
        min-width: 100%;
        min-height: 100vh;
        max-width: 100%;
        max-height: 100vh;
        object-fit: cover;
        z-index: -1;
    }

    #bg-video::-webkit-media-controls {
        display: none !important;
    }

    .video-overlay {
        position: absolute;
        background-color: rgba(35,45,57,0.8);
        top: 0;
        left: 0;
        bottom: 7px;
        width: 100%;
    }

    .main_banner .caption {
        text-align: center;
        position: absolute;
        width: 80%;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
    }

    .main_banner .caption h6 {
        margin-top: 0px;
        font-size: 18px;
        text-transform: uppercase;
        font-weight: 800;
        color: #fff;
        letter-spacing: 0.5px;
    }

    .main_banner .caption h2 {
        margin-top: 30px;
        margin-bottom: 25px;
        font-size: 84px;
        text-transform: uppercase;
        font-weight: 800;
        color: #fff;
        letter-spacing: 1px;
    }

    .main_banner .caption h2 em {
        font-style: normal;
        color: #ed563b;
        font-weight: 900;
    }
    .main-button a {
        display: inline-block;
        font-size: 15px;
        padding: 12px 20px;
        background-color: #ed563b;
        color: #fff;
        text-align: center;
        font-weight: 400;
        text-transform: uppercase;
        transition: all .3s;
    }

    .main-button a:hover {
        background-color: #f9735b;
    }
</style>
<?php

use App\Models\Schedule;
?>
<section class="main-banner">
    <div class="main_banner">
        <video autoplay muted loop id="bg-video">
            <source src="<?= URL::to($homebanners->filelink) ?>" type="video/mp4" /> 
        </video>
        <div class="video-overlay header-text">
            <div class="caption">
                <h6>work harder, get stronger</h6>
                <h2>easy with our <em>gym</em></h2>
                <div class="main-button scroll-to-section">
                    <a href="<?= URL::to('/registration') ?>">Become a member (register)</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--About Us Start-->
<section class="main-about-us" id="aboutus">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img-box wow fadeInLeft" data-wow-delay=".5s">
                    <div class="about-img-one">
                        <img src="<?= URL::to($companyprofile->profphoto) ?>" alt="About Us">
                    </div>
                    <div class="about-img-bg"></div>
                    <div class="fitness">
                        <img src="assets/images/fitness.png" alt="Fitness">
                    </div>
                    <div class="about-circle-one">
                        <img style="background: red;" src="assets/images/about-circle-one.png" alt="Circle">
                    </div>
                    <div class="about-circle-two">
                        <img style="background: red;" src="assets/images/about-circle-two.png" alt="Circle">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content-box wow fadeInRight" data-wow-delay=".5s">
                    <div class="about-us-title">
                        <div class="subtitle">
                            <h2 class="h2-subtitle">About Us</h2>
                        </div>
                        <h2 class="h2-title">
                            <?= $companyprofile->homeshorttext ?>
                        </h2>
                    </div>
                    <p>
                        {!! $companyprofile->abouttext !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--About Us End-->
<!--Classes Start-->
<section class="main-classes" id="classes">
    <div class="classes-overlay-bg animate-this">
        <img src="assets/images/classes-overlay-bg.png" alt="Overlay">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="classes-title">
                    <div class="subtitle">
                        <h2 class="h2-subtitle">Our Classes</h2>
                    </div>
                    <h2 class="h2-title">Fitness Classes For Every Goal</h2>
                </div>
            </div>
        </div>
        <div class="row class-slider" id="counter">
            @foreach($gymclasses as $value)
            <div class="col-lg-4">
                <div class="class-box wow fadeInDown" data-wow-delay=".5s">
                    <div class="class-img">
                        <img src="{{URL::to($value->photo)}}" alt="Class">
                    </div>
                    <div class="class-box-contant">
                        <div class="class-box-title">
                            <div class="class-box-icon">
                                <!--<img src="assets/images/class-icon4.png" alt="Icon">-->
                            </div>
                            <a href="javascript:void(0)"><h3 class="h3-title">{{$value->name}}</h3></a>
                            <!--                            <a href="{{URL::to('viewclass?slug='.$value->slug)}}"><h3 class="h3-title">{{$value->name}}</h3></a>-->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--Classes End-->

<!--Schedule Start-->
<section class="main-schedule" id="schedule">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="schedule-title">
                    <div class="subtitle">
                        <h2 class="h2-subtitle">Our Schedule</h2>
                    </div>
                    <h2 class="h2-title">Check Our  Classes Schedule</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="main-schedule-box wow fadeInUp" data-wow-delay=".5s">
                    <div class="schedule-box">
                        <div class="schedule-time-box">
                            <ul>
                                <li><img src="assets/images/clock-1.png" alt="Clock"></li>
                                @foreach($getgymtimes as $value)
                                <li><h3 class="h3-title">{{$value->name}}</h3></li>
                                @endforeach                                
                            </ul>
                        </div>
                        @foreach($getweekdays as $days)
                        <div class="schedule-class-box">
                            <ul>
                                <li><h3 class="h3-title"><?= $days->day ?></h3></li>
                                <?php
                                $getschedules = Schedule::with('class', 'trainer')->where('day', $days->day)->get();
                                foreach ($getschedules as $value) {
                                    ?>
                                    <li>
                                        <div class="schedule-class-text">
                                            <a href="{{URL::to('view-class-schedule/'.$value->id)}}">
                                                <h3 class="h3-title"><?= $value->class->name ?></h3>
                                                <span><?= $value->trainer->name ?></span>
                                            </a>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        @endforeach     
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Schedule End-->
<!--Team Start-->
<section class="main-team" id="trainers">
    <div class="team-overlay-bg animate-this">
        <img src="assets/images/team-overlay-bg.png" alt="Overlay">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="team-title">
                    <div class="subtitle">
                        <h2 class="h2-subtitle">Best Trainer</h2>
                    </div>
                    <h2 class="h2-title">Our Professional Trainer</h2>
                </div>
            </div>
        </div>
        <div class="row team-slider">
            @foreach($gymtraniners as $value)
            <div class="col-lg-3">
                <div class="team-box wow fadeInUp" data-wow-delay=".5s">
                    <div class="team-img-box team-border-one">
                        <div class="team-img">
                            <img src="{{URL::to($value->photo)}}" alt="Trainer">
                        </div>
                    </div>
                    <div class="team-content">
                        <a href="{{URL::to('view-trainer-info?id='.$value->id)}}"><h3 class="h3-title team-text-color">{{$value->name}}</h3></a>
                        <span>{{$value->post}}</span>
                        <div class="team-social">
                            <ul>
                                <?php
                                $social_link = explode('$$', $value->social_link);
                                $social_icon = explode('$$', $value->social_icon);
                                foreach ($social_link as $key => $slink) {
                                    ?>
                                    <li>
                                        <a href="<?= $slink ?>"><i class="fa fa-<?= $social_icon[$key] ?>" aria-hidden="true"></i></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--Team End-->

<!--Pricing Start-->
<section class="main-pricing" id="packages">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pricing-title">
                    <div class="subtitle">
                        <h2 class="h2-subtitle">Pricing Table</h2>
                    </div>
                    <h2 class="h2-title">Choose Your Pricing Plan</h2>
                </div>
            </div>
        </div>
        <div class="row pricing-slider">
            @foreach($getplandata as $value)
            <div class="col-lg-4">
                <div class="pricing-box wow fadeInDown" data-wow-delay=".5s">
                    <div class="pricing-title-box pricing-two">
                        <h3 class="h3-title">{{$value->name}}</h3>
                        <h2 class="h2-title">&#2547 {{$value->extra}}<span>/Month</span></h2>
                    </div>
                    <div class="pricing-content-box">
                        <div class="pricing-content">
                            <div class="pricing-point">
                                <?php
                                $singledata = DB::table('packages')->leftJoin('singledata', 'packages.equipment_id', '=', 'singledata.id')->where('plan_id', $value->id)->limit(5)->get();
                                ?>
                                <ul>
                                    @foreach($singledata as $svalue)
                                    <li>
                                        <img src="assets/images/check.png" alt="Check">
                                        <p>{{$svalue->name}}</p>
                                    </li>
                                    @endforeach
                                    <li>
                                        <img src="assets/images/check.png" alt="Check">
                                        <p>....................Etc.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="{{URL::to('registration?plan='.$value->id)}}" class="sec-btn">Join Now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--Pricing End-->
<!--Contact Us Start-->
<section class="main-contact-in" id="contactus">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="get-in-touch-content wow fadeInLeft" data-wow-delay=".5s">
                    <div class="get-in-touch-title">
                        <div class="subtitle">
                            <h2 class="h2-subtitle">Contact Us</h2>
                        </div>
                        <h2 class="h2-title">Get In Touch</h2>
                    </div>
                    <div class="get-in-touch-box">
                        <div class="get-in-touch-icon">
                            <img src="assets/images/email.png" alt="Email">
                        </div>
                        <div class="get-in-touch-text">
                            <h3 class="h3-title">Email:</h3>
                            <span><?= $companyprofile->email ?></span>
                        </div>
                    </div>
                    <div class="get-in-touch-box">
                        <div class="get-in-touch-icon">
                            <img src="assets/images/phone.png" alt="Email">
                        </div>
                        <div class="get-in-touch-text">
                            <h3 class="h3-title">Call Now:</h3>
                            <span><?= $companyprofile->contact ?></span>
                        </div>
                    </div>
                    <div class="get-in-touch-box">
                        <div class="get-in-touch-icon">
                            <img src="assets/images/location.png" alt="Email">
                        </div>
                        <div class="get-in-touch-text mb-0">
                            <h3 class="h3-title">Location:</h3>
                            <span><?= $companyprofile->address ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="appointment-bg wow fadeInRight" data-wow-delay=".5s">
                    <div class="appointment-title">
                        <h2 class="h2-title">Get Appointment</h2>
                        <div class="line"></div>
                    </div>
                    <form method="post" action="{{route('getappointment')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-box">
                                    <input type="text" name="fullname" class="form-input" placeholder="Full Name" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-box">
                                    <input type="email" name="email" id="getmailaddress" class="form-input" placeholder="Email Address" required="">
                                </div>
                                <div style="float: left;position: relative;bottom: 12px;left: 12px;;color: red" id="setexception"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-box">
                                    <input type="text" name="contact" maxlength="11" oninput="numberOnly(this.id);" id="contactnumber" class="form-input getcontactnumber" placeholder="Phone Number" required="">
                                </div>
                                <div style="float: left;position: relative;bottom: 12px;left: 12px;;color: red" id="checkcontact"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-box">
                                    <input type="text" name="location" maxlength="22" class="form-input" placeholder="Area Name" required="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-box">
                                    <textarea class="form-input" name="message" placeholder="Message..."></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-box mb-0">
                                    <button type="submit" id="hidSavebtn" onclick="return confirm('Are you sure ?')" class="sec-btn"><span>Submit Now</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="main-contact-map-in">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d58345.8370356026!2d90.39051679999999!3d23.938690100000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1603517982898!5m2!1sen!2sbd" width="416" height="570" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<script src="assets/js/jquery.min.js"></script>
<script>
                                        $(document).ready(function () {
                                            $('body').on('blur', '#getmailaddress', function () {
                                                var value = $(this).val();
                                                $("#loader").show();
                                                if (value) {
                                                    $.ajax({
                                                        type: 'GET',
                                                        url: '{{URL::to("check_exist_emailaddress")}}',
                                                        data: {value: value},
                                                        async: false,
                                                        dataType: 'text',
                                                        success: function (data) {
                                                            $("#loader").hide();
                                                            if (data === '1') {
                                                                $("#setexception").html("This Email Address Already Exist!").css("color", "red");
                                                                $('#hidSavebtn').hide();
                                                            } else {
                                                                $("#setexception").html(" ");
                                                                $('#hidSavebtn').show();
                                                            }
                                                        },
                                                        error: function () {
                                                            alert('Something is wrong !');
                                                        }
                                                    });
                                                } else {
                                                    $("#setexception").html(" ");
                                                    $('#hidSavebtn').hide();
                                                }
                                            });
                                        });
</script>
<script>
    $(document).ready(function () {
        $('form').attr('autocomplete', 'off');
    });
</script>
<script>
    function textOnly(id) {
        // Only Capital or Small Chracters will write
        var element = document.getElementById(id);
        var regex = /[0-9,<>?/;:'",-=@#$%^&*()_+{}]/gi;
        element.value = element.value.replace(regex, "");
    }
    function numberOnly(id) {
        // Only Number will write
        var element = document.getElementById(id);
        var regex = /[^0-9]/gi;
        element.value = element.value.replace(regex, "");
    }
</script>
<script>
    function textOnly(id) {
        // Only Capital or Small Chracters will write
        var element = document.getElementById(id);
        var regex = /[0-9,<>?/;:'",-=@#$%^&*()_+{}]/gi;
        element.value = element.value.replace(regex, "");
    }
    function numberOnly(id) {
        // Only Number will write
        var element = document.getElementById(id);
        var regex = /[^0-9]/gi;
        element.value = element.value.replace(regex, "");
    }
</script>
<script>
    $(document).ready(function () {
        $(".getcontactnumber").blur(function () {
            var inputNumber = $(this).val();
            if (inputNumber) {
                var pattern = /^01\d*$/; // Regular expression to match numbers starting with 0
                if (pattern.test(inputNumber)) {
                    $("#checkcontact").html(" ");
                    $("#hidSavebtn").show();
                } else {
                    $("#checkcontact").html("Number should start with 01 and max length 11");
                    $("#hidSavebtn").hide();
                }
            } else {
                $("#checkcontact").html(" ");
            }

        });
    });
</script>
@endsection