@extends('layouts.index')
@section('content')
@section('title',$title)
<!--Banner Start-->
<section class="main-inner-banner jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url(assets/images/blog-detail-in-banner.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-in-title">
                    <h1 class="h1-title">GYM Contact Us</h1>
                </div>
                <div class="banner-breadcum">
                    <ul>
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li><a href="javascript:void(0)">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
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