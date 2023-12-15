<?php
$urlpath = Request::path();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <meta name="keywords" content="Fithub">
        <meta name="description" content="Fithub">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- FavIcon CSS -->
        <link rel="icon" href="{{asset('/')}}/public/assets/images/favicon.png" type="image/gif" sizes="16x16">
        <!--Bootstrap CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('/')}}/public/assets/css/bootstrap.min.css">
        <!--Google Fonts CSS-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="{{asset('/')}}public/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!--Font Awesome Icon CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('/')}}/public/assets/css/font-awesome.min.css">
        <!-- Slick Slider CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('/')}}/public/assets/css/slick.css">
        <link rel="stylesheet" type="text/css" href="{{asset('/')}}/public/assets/css/slick-theme.css">
        <!-- Wow Animation CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('/')}}/public/assets/css/animate.min.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('/')}}/public/assets/css/magnific-popup.min.css">
        <!-- Main Style CSS  -->
        <link rel="stylesheet" type="text/css" href="{{asset('/')}}/public/assets/css/style.css">
        <link rel="stylesheet" href="{{asset('/')}}backend/css/toastr.css">
        <style>
            .site-header.sticky-header .main-navigation ul li a:before{
                color: #fff;
            }
        </style>
        <?php if ($urlpath == 'registration' or $urlpath == "onlinepayment" or $urlpath == "paymentstatus") { ?>
            <style>
                #header_bottom{
                    background:#000;
                }
            </style>
        <?php } ?>
    </head>
    <body>
        <!-- Loader Start -->
        <div class="loader-box">
            <div class="loader-text">
                <span class="let1">L</span>
                <span class="let2">o</span>
                <span class="let3">a</span>
                <span class="let4">d</span>
                <span class="let5">i</span>
                <span class="let6">n</span>
                <span class="let7">g</span>
                <span class="let8">.</span>
                <span class="let9">.</span>
                <span class="let10">.</span>
            </div>
        </div>
        <!-- Header Start -->
        <header class="site-header">
            <!--Navbar Start  -->
            <div class="header-bottom" id="header_bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <!-- Sit Logo Start -->
                            <div class="site-branding">
                                <a href="<?= URL::to('/') ?>" title="Fithub">
                                    <img src="{{asset('/')}}/public/assets/images/logo.png" alt="Logo">
                                    @if($urlpath=="registration")
                                    <img src="{{asset('/')}}/public/assets/images/logo.png" class="sticky-logo" alt="Logo">
                                    @else
                                    <img src="{{asset('/')}}/public/assets/images/logo_stickey.png" class="sticky-logo" alt="Logo">
                                    @endif
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="header-menu">
                                <nav class="main-navigation one">
                                    <button class="toggle-button">
                                        <span></span>
                                        <span class="toggle-width"></span>
                                        <span></span>
                                    </button>
                                    <div class="mobile-menu-box">
                                        <i class="menu-background top"></i>
                                        <i class="menu-background middle"></i>
                                        <i class="menu-background bottom"></i>
                                        <ul class="menu">
                                            <li <?= $urlpath == '/' ? 'class="active"' : '' ?>><a href="<?= URL::to('/') ?>">Home</a> </li>
                                            <li <?= $urlpath == 'about-us' ? 'class="active"' : '' ?>><a href="<?= URL::to('/about-us') ?>">About Us</a></li>
                                            <li <?= $urlpath == 'classes' ? 'class="active"' : '' ?>><a  href="<?= URL::to('/classes') ?>">Classes</a></li>
                                            <li <?= $urlpath == 'schedules' ? 'class="active"' : '' ?>><a  href="<?= URL::to('/schedules') ?>">Schedules</a></li>
                                            <li <?= $urlpath == 'trainers' ? 'class="active"' : '' ?>><a  href="<?= URL::to('/trainers') ?>">Trainers</a></li>
                                            <li <?= $urlpath == 'packages' ? 'class="active"' : '' ?>><a  href="<?= URL::to('/packages') ?>">Packages</a></li>
                                            <li <?= $urlpath == 'galleries' ? 'class="active"' : '' ?>><a  href="<?= URL::to('/galleries') ?>">Gallery</a></li>
                                            <li <?= $urlpath == 'contact-us' ? 'class="active"' : '' ?>><a  href="<?= URL::to('/contact-us') ?>">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </nav>
                                <div class="black-shadow"></div>
                                <div class="header-btn">
                                    <a href="<?= URL::to('/auth/login') ?>" class="sec-btn" style="font-size: 12px">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Navbar End  -->
        </header>
        @yield('content')
        <footer class="main-footer">
            <div class="footer-overlay-bg animate-this">
                <img src="{{asset('/')}}/public/assets/images/footer-overlay.png" alt="Overlay">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-box-one">
                            <h3 class="h3-title" style="color: #fff">Schedule</h3>
                            <div class="footer-time">
                                <img src="{{asset('/')}}/public/assets/images/clock-2.png" alt="Clock">
                                <div class="footer-time-text-box">
                                    <div class="footer-time-text">
                                        <span>Saturday - Friday</span>
                                        <span>8:00Am - 8:00Pm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-box-two">
                            <h3 class="h3-title">Our Links</h3>
                            <div class="line"></div>
                            <ul class="menu">
                                <li><a href="<?= URL::to('/') ?>">Home</a> </li>
                                <li><a href="<?= URL::to('/') ?>#aboutus">About Us</a></li>
                                <li><a  href="<?= URL::to('/') ?>/classes">Classes</a></li>
                                <li><a  href="<?= URL::to('/') ?>#schedule">Schedule</a></li>
                                <li><a  href="<?= URL::to('/') ?>/trainers">Trainers</a></li>
                                <li><a  href="<?= URL::to('/') ?>/packages">Packages</a></li>
                                <li><a  href="<?= URL::to('/galleries') ?>">Gallery</a></li>
                                <li><a  href="<?= URL::to('/') ?>#contactus">Contact Us</a></li>
                                <li><a  href="<?= URL::to('/') ?>/former-member">Former Member</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-box-three">
                            <h3 class="h3-title">Contact Us</h3>
                            <div class="line"></div>
                            <ul>
                                <li>
                                    <div class="footer-contact-icon">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    </div>
                                    <div class="footer-contact-text">
                                        <span><?= $companyprofile->address ?></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-contact-icon">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </div>
                                    <div class="footer-contact-text">
                                        <span><?= $companyprofile->contact ?></span>
                                        <span><?= $companyprofile->contacttwo ?></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-contact-icon">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </div>
                                    <div class="footer-contact-text">
                                        <span><?= $companyprofile->email ?></span>
                                        <span><?= $companyprofile->emailtwo ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-box-four">
                            <h3 class="h3-title">Social Links</h3>
                            <div class="line"></div>
                            <!--                            <div class="footer-subscribe-form">
                                                            <input type="email" name="email" class="form-input subscribe-input" placeholder="Email Address" required="">
                                                            <button type="submit" class="sec-btn"><i class="fa fa-chevron-right"></i></button>
                                                        </div>-->
                            <div class="footer-social">
                                <ul>
                                    <li><a href="<?= $companyprofile->facebook ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="<?= $companyprofile->instagram ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="<?= $companyprofile->twitter ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="<?= $companyprofile->linkedin ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="<?= $companyprofile->youtube ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-7">
                            <div class="copyright-text">
                                <span>Copyright © <?= date('Y') ?> <a href="<?= URL::to('/') ?>">FitHub.</a> All rights reserved.</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5">
                            <div class="copyright-links">
                                <ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Footer End-->
        <!--Back To Top Start-->
        <div class="progress-wrap active-progress">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewbox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 280.807;"></path>
            </svg>
        </div>
        <!--BAck To Top End-->
        <!-- modal-search-start -->
        <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
            </button>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <input type="text" placeholder="Search here...">
                        <button>
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal-search-end -->
        <!-- Jquery JS Link -->
        <script src="{{asset('/')}}/public/assets/js/jquery.min.js"></script>
        <!-- Bootstrap JS Link -->
        <script src="{{asset('/')}}/public/assets/js/bootstrap.min.js"></script>
        <script src="{{asset('/')}}/public/assets/js/popper.min.js"></script>
        <!-- Custom JS Link -->
        <script src="{{asset('/')}}/public/assets/js/custom.js"></script>
        <!-- Slick Slider JS Link -->
        <script src="{{asset('/')}}/public/assets/js/slick.min.js"></script>
        <!-- Wow Animation JS -->
        <script src="{{asset('/')}}/public/assets/js/wow.min.js"></script>
        <!--Bg Moving Js-->
        <script src="{{asset('/')}}/public/assets/js/bg-moving.js"></script>
        <!--Magnific Popup JS-->
        <script src="{{asset('/')}}/public/assets/js/magnific-popup.js"></script>
        <script src="{{asset('/')}}/public/assets/js/custom-magnific-popup.js"></script>
        <!--Progress Bar JS-->
        <script src="{{asset('/')}}/public/assets/js/custom-progress-bar.js"></script>
        <!--Scroll Count JS-->
        <script src="{{asset('/')}}/public/assets/js/custom-scroll-count.js"></script>
        <!--BAck To Top JS-->
        <script src="{{asset('/')}}/public/assets/js/back-to-top.js"></script>
        <script src="{{asset('/')}}backend/js/toastr.min.js"></script>
        <script src="{{asset('/')}}backend/js/chart.js"></script>
        <script>
        </script>
        <script>
            $(document).ready(function () {
                $('form').attr('autocomplete', 'off');
            });
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
    </body>
</html>