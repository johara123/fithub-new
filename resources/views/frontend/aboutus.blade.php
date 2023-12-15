@extends('layouts.index')
@section('content')
@section('title',$title)
<!--Banner Start-->
<section class="main-inner-banner jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url(assets/images/about-in-banner.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-in-title">
                    <h1 class="h1-title">About Us</h1>
                </div>
                <div class="banner-breadcum">
                    <ul>
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li><a href="javascript:void(0)">About</a></li>
                    </ul>
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
@endsection