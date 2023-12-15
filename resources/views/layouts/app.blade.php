<?php
//$urlslug = Request::get('panel');
global $sysrole;
$urlpath = Request::path();

$empid = Auth::user()->profile_id;
$sysrole = Auth::user()->role_id;

if (Session::get('roleid')) {
    $roleid = Session::get('roleid');
} else {
    $roleid = $sysrole;
}
?>
<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title') | Fithub - Health Quality Service</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}favicon.ico">
        <link rel="stylesheet" href="{{asset('/')}}backend/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('/')}}backend/css/animate.css">
        <link rel="stylesheet" href="{{asset('/')}}backend/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('/')}}backend/css/mainstyle.min.css">
        <link rel="stylesheet" href="{{asset('/')}}backend/css/all-skins.min.css">
        <link rel="stylesheet" href="{{asset('/')}}backend/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.css">
        <link rel="stylesheet" href="{{asset('/')}}backend/css/jquery-ui.css">
        <link rel="stylesheet" href="{{asset('/')}}backend/css/sweetalert.css">
        <link rel="stylesheet" href="{{asset('/')}}backend/css/select2.min.css">
        <link rel="stylesheet" href="{{asset('/')}}backend/css/scrolltop.css">
        <link rel="stylesheet" href="{{asset('/')}}backend/css/responsivestyle.css">
        <link rel="stylesheet" href="{{asset('/')}}backend/css/toastr.css">

        <style>
            @media print {
                body {
                    -webkit-print-color-adjust: exact;
                }
            }
            /* Montserrat */
            @font-face {
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 400;
                src: url('{{asset("/")}}public/backend/fonts/Montserrat-Regular.ttf');
            }

            .form-control {
                height: 40px;
            }
            .select2-container--default .select2-selection--single {
                border-radius: 10px;
                border: 1px solid #3c8dbc;
                height: 40px;
            }
            div.dataTables_wrapper div.dataTables_length select{
                width: 75px;
                display: inline-block;
                border: 1px solid #3c8dbc;
            }
            div.dataTables_wrapper div.dataTables_filter input{
                margin-left: 0.5em;
                display: inline-block;
                width: auto;
                border: 1px solid #3c8dbc;
            }

            /*            .inputbody::placeholder{
                            color: #fff;
                            font-size:18px;
                        }*/
            .form-control option {
                font-size: 16px;
            }
            .tableborder{
                border: 2px solid #3c8dbc;
            }
            .tableheader{
                background:#3c8dbc;
                color:#fff;
                font-weight:bold;
                text-transform: uppercase;
            }
            .inputtext{
                border-radius:10px;
                border:1px solid #3c8dbc;
                text-transform: capitalize
            }
            .inputnumber{
                border-radius:10px;
                border:1px solid #3c8dbc;
            }
            .big{
                width:2em;
                height:2em;
                cursor: pointer;
            }
            .blink {
                animation: blinker 1.8s linear infinite;
                /*        color: #1c87c9;*/
                font-size:15px;
                font-weight: bold;
                font-family: sans-serif;
            }
            @keyframes blinker {
                50% {
                    opacity: 0;
                }
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
            #getloader {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                width: 100%;
                background: rgba(0,0,0,0.75) url("{{asset('/')}}public/images/loader2.gif") no-repeat center center;
                z-index: 99999;
            }
        </style>
        <script src="{{asset('/')}}backend/js/jquery.min.js"></script>
        <script src="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/ckeditor.js"></script>
    </head>

    <body class="hold-transition skin-blue sidebar-mini" id="app">
        <div class="wrapper" style="font-family:Montserrat;">
            <header class="main-header" style="position:fixed;width:100%">
                <a href="{{URL::to('admin')}}" class="logo">
                    <span class="logo-mini"><b>F</b>HB</span>
                    <span class="logo-lg"><b>Fit</b>Hub</span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            @if($sysrole==1)
                            <li class="dropdown notifications-menu">
                                <a href="{{URL::to('viewallnotifications')}}" class="dropdown-toggle">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-danger" id="allnoti"></span>
                                </a>
                            </li>
                            @endif
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{asset('/')}}images/user.png" class="user-image" alt="User Image">
                                    <span class="hidden-xs">{{Auth::user()->name}}</span>
                                </a>
                            </li>
                            <li><a href="javascript:void(0)" id="getlogutbox"><i class="fa fa-sign-out"></i></a></li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <div class="user-panel" style="margin-top: 10px;"></div>
                    <ul class="sidebar-menu" data-widget="tree">
                        @if($roleid==1)
                        @include('menus.index')
                        @endif
                        @if($roleid==2)
                        @include('menus.manager')
                        @endif
                        @if($roleid==3)
                        @include('menus.member')
                        @endif
                    </ul>
                </section>
            </aside>
            <div class="content-wrapper" id="contentWrapper" style="font-family: Montserrat">
                @yield('content')
            </div>
            <a id="back2Top" title="Back to top" href="#">&#10148;</a>
            <footer class="main-footer"></footer>
        </div>
        <script src="{{asset('/')}}backend/js/bootstrap.min.js"></script>
        <script src="{{asset('/')}}backend/js/jquery.dataTables.min.js"></script>
        <script src="{{asset('/')}}backend/js/dataTables.bootstrap.min.js"></script>
        <script src="https://adminlte.io/themes/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="{{asset('/')}}backend/js/jquery-ui.js"></script>
        <script src="{{asset('/')}}backend/js/maincsript.min.js"></script>
        <script src="{{asset('/')}}backend/js/scrolltop.js"></script>
        <script src="{{asset('/')}}backend/js/select2.full.min.js"></script>
        <script src="{{asset('/')}}backend/js/sweetalert.min.js"></script>
        <script src="{{asset('/')}}backend/js/toastr.min.js"></script>
        <script>
        </script>
        <script>
            window.onload = function () {
                getallnotification();
            };
            function getallnotification() {
                $.ajax({
                    type: "GET",
                    url: "<?= URL::to('getallnotification') ?>",
                    success: function (data) {
                        $('#allnoti').html(data);
                    }
                });
            }
        </script>
        <script>
            $(function () {
                $('.getTable').DataTable();
                $('.modelTable').DataTable();
                $('.allTable').DataTable({
                    "paging": false,
                    "ordering": false,
                    "info": false
                });
                $('.allTabledata').DataTable({
                    //"paging": false,
                    "ordering": false
                            //"info": false

                });
                // $('.myselect').selectpicker();
                $('.getSelect').select2();
                $(".allDate").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "1971:2050",
                    dateFormat: "yy-mm-dd"
                });
                $('.timepicker').timepicker({
                    showInputs: false,
                    defaultTime: ''
                });
            });
            $(document).ready(function () {
                $('form').attr('autocomplete', 'off');
            });
        </script>
        <script>
        </script>
        @if (Session::has('setmessage'))
        <script>
            var type = "{{Session::get('alerttype')}}";
            if (type === "success") {
                toastr.options.timeOut = 4000;
                toastr.success("{{Session::get('setmessage')}}");
            } else if (type === "warning") {
                toastr.options.timeOut = 4000;
                toastr.warning("{{Session::get('setmessage')}}");
            } else {
                toastr.options.timeOut = 4000;
                toastr.error("{{Session::get('setmessage')}}");
            }
        </script>
        @endif
        <script>
            $(document).ready(function () {
                $("body").tooltip({selector: '[data-toggle=tooltip]'});
                $('#getlogutbox').click(function () {
                    swal({
                        title: "Are you sure ?",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    }, function (isConfirm) {
                        if (isConfirm) {
                            swal(window.location.href = "{{URL::to('logout')}}");
                        } else {
                            swal("Cancelled");
                        }
                    });
                });
            });
            function scrollSmoothToBottom() {
                var scrollingElement = (document.scrollingElement || document.body);
                $(scrollingElement).animate({
                    scrollTop: document.body.scrollHeight
                }, 500);
            }
        </script>
        <script>
            $(function () {
                $("form").submit(function () {
                    $('#postloader').show();
                });
            });
        </script>
    </body>
</html>
