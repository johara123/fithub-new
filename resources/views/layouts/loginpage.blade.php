<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="robots" content="noindex, nofollow">
        <title>Login | Fithub - Health Quality Service</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}favicon.ico">
        <link rel="stylesheet" href="{{asset('/')}}backend/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('/')}}backend/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('/')}}backend/css/loginstyle.css">
        <link rel="stylesheet" href="{{asset('/')}}backend/css/toastr.css">
        <style>
            body {
                /* Location of the image */
                background-image: url('{{asset("/")}}images/background-photo.jpg');

                /* Image is centered vertically and horizontally at all times */
                background-position: center center;

                /* Image doesn't repeat */
                background-repeat: no-repeat;

                /* Makes the image fixed in the viewport so that it doesn't move when 
                   the content height is greater than the image height */
                background-attachment: fixed;

                /* This is what makes the background image rescale based on its container's size */
                background-size: cover;

                /* Pick a solid background color that will be displayed while the background image is loading */
                background-color:#464646;
            }

            /* For mobile devices */
            @media  only screen and (max-width: 767px) {
                body {
                    /* The file size of this background image is 93% smaller
                     * to improve page load speed on mobile internet connections */
                    background-image: url('{{asset("/")}}images/background-photo.jpg');
                }
            }
            .page-title-box{
                color: #fff;
                font-size: 22px;
                font-weight: normal;
                margin-left: 50px;
                margin-top: -36px;
                font-family: cursive;
            }
            .inputstyle{
                border: 2px solid #667eea !important;
                border-radius: 10px !important;
            }
            #postloader {
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
    </head>
    <body>
        <div id="postloader"></div>
        <div class="main-wrapper">
            <div class="header" id="headerbg">
                <div class="page-title-box float-left">
                    <h3 style="margin-top: 35px;">Fithub - Health Quality Service</h3>
                </div>
            </div><br>
            <div class="page-wrapper job-wrapper">
                <div class="main-wrapper">
                    <div class="account-content">
                        <div class="container">
                            <div class="account-box">
                                <div class="account-wrapper">
                                    <p class="account-subtitle">Member/Admin Login Box</p>
                                    <form action="{{route('usersaccess')}}" method="post" autocomplete="off">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input type="hidden" name="type" value="student">
                                            <label><i class="fa fa-user-secret"></i> Username</label>
                                            <input class="form-control inputstyle" name="username" value="{{old('username')}}" type="text" placeholder="Enter Username">
                                            <span style="position: relative;top: 5px;font-size: 15px;" class="text-danger">@error('username'){{$message}}@enderror</span>
                                        </div>
                                        <div class="form-group"> 
                                            <label><i class="fa fa-key"></i> Password</label>
                                            <input class="form-control inputstyle" name="password" value="{{old('password')}}" type="password" placeholder="Enter Password">
                                            <span style="position: relative;top: 5px;font-size: 15px;" class="text-danger">@error('password'){{$message}}@enderror</span>
                                        </div>
                                        <div class="form-group text-center">
                                            <button class="btn btn-primary account-btn" type="submit"><i class="fa fa-sign-in"></i> Login</button>
                                        </div>
                                    </form>
                                    <!--<a href="#" style="float:right" class="account-subtitle">Forgot Password ?</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('/')}}backend/js/jquery.min.js"></script>
        <script src="{{asset('/')}}backend/js/bootstrap.min.js"></script>
        <script src="{{asset('/')}}backend/js/toastr.min.js"></script>
        <script>
        </script>
        @if (Session::has('setmessage'))
        <script>
            var type = "{{Session::get('alerttype')}}";
            if (type === "success") {
                toastr.options.timeOut = 4000;
                toastr.success("{{Session::get('setmessage')}}");
            } else {
                toastr.options.timeOut = 4000;
                toastr.error("{{Session::get('setmessage')}}");
            }
        </script>
        @endif
        <script>
            $(function () {
                $("form").submit(function () {
                    $('#postloader').show();
                });
            });
        </script>
    </body>
</html>