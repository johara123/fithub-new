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
    #loader {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        background: rgba(0,0,0,0.75) url("{{asset('/')}}public/images/loader.gif") no-repeat center center;
        z-index: 99999;
    }
</style>
<div id="loader"></div>
<!--Pricing End-->
<!--Contact Us Start-->
<section class="main-contact-in" id="contactus">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="appointment-bg wow fadeInRight" data-wow-delay=".5s">
                    <div class="appointment-title">
                        <h2 class="h2-title">Get Registration</h2>
                        <div class="line"></div>
                    </div>
                    <form action="{{route('newregistration')}}" method="post" name="getformdata">
                        @csrf
                        <input type="hidden" name="package" id="set_package" value="<?= @$plandata->name ?>">
                        <input type="hidden" name="packageamt" id="set_package_amt" value="<?= @$plandata->extra ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-box">
                                    <input type="hidden" name="systemmail" value="<?= $getsystemmail->name ?>">
                                    <input name="fname" type="text" oninput="textOnly(this.id);" id="fname" maxlength="22" class="form-input" placeholder="Enter First Name ** (Max Length 22)" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box">
                                    <input name="lname" type="text" oninput="textOnly(this.id);" id="lname" maxlength="22" class="form-input" placeholder="Enter Last Name ** (Max Length 22)" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-box">
                                    <input name="email" id="getmailaddress" type="text" class="form-input"  pattern="[^ @]*@[^ @]*" placeholder="Enter Email Address (Should Be Unique) **" required="">
                                </div>
                                <span style="float: left;margin-left: 10px;color:red" id="setexception"></span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box">
                                    <input name="contact" type="text" oninput="numberOnly(this.id);" id="contact" maxlength="11" class="form-input" placeholder="Enter Contact Number **" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-box">
                                    <input name="address" type="text" class="form-input" placeholder="Enter Present Address **" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-box">
                                    <select name="gender" class="form-input" required="">
                                        <option value="" disabled selected>Select Gender **</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>                  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box">
                                    <select name="occupation" class="form-input" required="">
                                        <option value="" disabled selected>Select Occupation **</option>
                                        <option value="Service">Service</option>
                                        <option value="Student">Student</option>
                                        <option value="Businessman">Businessman</option>
                                        <option value="Housewife">House Wife</option>
                                        <option value="Other">Other</option>
                                    </select>                 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-box">
                                    <input name="height" type="text" class="form-input" placeholder="Enter Your Height(Like 5 Feet 3 Inch) **" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box">
                                    <input name="weight" type="text" oninput="numberOnly(this.id);" id="1" class="form-input" placeholder="Enter Your Weight(Kg) **" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-box">
                                    <select name="reason" class="form-input" required="">
                                        <option value="" disabled selected>Why do you need GYM? **</option>
                                        <option value="Weight Loss">Weight Loss</option>
                                        <option value="Weight Gain">Weight Gain</option>
                                        <option value="Body Fit">Body Fit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-box">
                                    <select name="packageinfo" class="form-input" required="">
                                        <option value="" disabled selected>Select Package **</option>
                                        @foreach($getplandata as $value)
                                        <option value="{{$value->name}}={{$value->extra}}">{{$value->name}} => {{$value->extra}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-box">
                                    <select name="paymethod" class="form-input" required="">
                                        <option value="" disabled selected>Select Payment Method **</option>
                                        <option value="Cash">Cash Payment</option>
                                        <option value="Online">Online Payment</option>
                                    </select>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-box">
                                    <select name="trainer" class="form-input">
                                        <option value="" disabled selected>Select Trainer (Optional)</option>
                                        @foreach($gymtraniners as $value)
                                        <option value="{{$value->id}}">{{$value->name}} => {{$value->post}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-box">
                                    <input name="username" type="text" id="getUsername" class="form-input" placeholder="Enter Unique Username **" required="">
                                </div>
                                <span style="float: left;margin-left: 10px;color:red" id="setuserexception"></span>
                            </div>
                            <div class="col-md-4">
                                <div class="form-box">
                                    <input name="password" type="password" id="getPassword" class="form-input" placeholder="Enter Your Password *" required="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-box">
                                    <input type="password"  id="confirmPassword" class="form-input" placeholder="Enter Confirm Password *" required="">
                                </div>
                                <div style="float: left;position: relative;bottom: 12px;left: 12px;" id="checkPasswordMatch"></div>
                            </div>
                        </div>
                        <center>
                            <button type="submit" id="hidesavebtn" class="sec-btn"><i class="fa fa-send-o"></i> Next Process</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="assets/js/jquery.min.js"></script>
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
function numbertextOnly(id) {
    // Only Number will write
    var element = document.getElementById(id);
    var regex = /[^0-9.]/gi;
    element.value = element.value.replace(regex, "");
}
function subjectOnly(id) {
    // Only Capital or Small Chracters will write
    var element = document.getElementById(id);
    var regex = /[0-9,<>?/;:'",-=@#$%^&*()_+{}]/gi;
    element.value = element.value.replace(regex, "");
}
</script>
<script>
    $(document).ready(function () {
        $('body').on('blur', '#getmailaddress', function () {
            var value = $(this).val();
            $("#loader").show();
            if (value) {
                $.ajax({
                    type: 'GET',
                    url: '{{URL::to("check_duplicate_mailaddress")}}',
                    data: {value: value},
                    async: false,
                    dataType: 'text',
                    success: function (data) {
                        $("#loader").hide();
                        if (data === '1') {
                            $("#setexception").html("This Email Address Already Exist!").css("color", "red");
                            $('#hidesavebtn').hide();
                        } else {
                            $("#setexception").html(" ");
                            $('#hidesavebtn').show();
                        }
                    },
                    error: function () {
                        alert('Something is wrong !');
                    }
                });
            } else {
                $("#setexception").html(" ");
                $('#hidesavebtn').hide();
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('change', 'select[name="packageinfo"]', function () {
            var values = $(this).val();
            var packageinfo = values.split('=');
            $("#set_package").val(packageinfo[0]);
            $("#set_package_amt").val(packageinfo[1]);
        });
    });
</script>
@if(@$plandata->name)
<script>
    document.forms['getformdata'].elements['packageinfo'].value = '<?= @$plandata->name ?>=<?= @$plandata->extra ?>';
</script>
@endif
<script>
    $(document).ready(function () {
        $('body').on('blur', '#getUsername', function () {
            var value = $(this).val();
            if (value) {
                $.ajax({
                    type: 'GET',
                    url: '{{URL::to("check_duplicate_username")}}',
                    data: {value: value},
                    async: false,
                    dataType: 'text',
                    success: function (data) {
                        if (data === '1') {
                            $("#setuserexception").html("This Username Already Exist!").css("color", "red");
                            $('#hidesavebtn').hide();
                        } else {
                            $("#setuserexception").html(" ");
                            $('#hidesavebtn').show();
                        }
                    },
                    error: function () {
                        alert('Something is wrong !');
                    }
                });
            } else {
                $("#setuserexception").html(" ");
                $('#hidesavebtn').hide();
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#confirmPassword").on('keyup', function () {
            var password = $("#getPassword").val();
            var confirmPassword = $(this).val();
            if (confirmPassword) {
                if (password !== confirmPassword) {
                    $("#checkPasswordMatch").html("Password does not match !").css("color", "red");
                    $('#hidesavebtn').hide();
                } else {
                    $("#checkPasswordMatch").html("Password match !").css("color", "white");
                    $('#hidesavebtn').show();
                }
            } else {
                $("#checkPasswordMatch").html(" ");
                $('#hidesavebtn').show();
            }
        });
    });
</script>
<script>
    $(function () {
        $("form").submit(function () {
            $('#loader').show();
        });
    });
</script>
@endsection