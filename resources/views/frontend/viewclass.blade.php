@extends('layouts.index')
@section('content')
@section('title',$title)
<!--Banner Start-->
<section class="main-inner-banner jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url(assets/images/class-detail-in-banner.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-in-title">
                    <h1 class="h1-title">{{$gymclasses->name}}</h1>
                </div>
                <div class="banner-breadcum">
                    <ul>
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li><a href="{{URL::to('/')}}#classes">Classes</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li><a href="javascript:void(0)">{{$gymclasses->name}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Banner End-->

<!--Class Detail Start-->
<section class="main-class-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="class-detail-content">
                    <div class="class-box-title">
                        <div class="class-box-icon">
                            <!--<img src="assets/images/class-icon1.png" alt="Icon">-->
                        </div>
                        <h2 class="h2-title">{{$gymclasses->name}}</h2>
                    </div>
                    <div class="class-detail-img wow fadeInUp" data-wow-delay=".5s">
                        <img src="{{URL::to($gymclasses->photo)}}" alt="Class Detail">
                    </div>
                    {!! $gymclasses->description !!}
                    <div class="class-detail-point">
                        <div class="row">
                            
                            <div class="col-lg-6 col-md-6">
                                <div class="points">
                                    <ul>
                                        <?php
                                        $features = explode('$$', $gymclasses->features);
                                        foreach ($features as $value) {
                                            ?>
                                            <li>
                                                <div class="point-object"></div><p><?= $value ?></p>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="class-detail-trainer-box wow fadeInUp" data-wow-delay=".5s">
                        <div class="class-trainer-box-img">
                            <img src="assets/images/class-detail-trainer-box-img.jpg" class="rounded-circle" alt="Trainer">
                        </div>
                        <div class="class-trainer-box-text">
                            <a href="team-detail.html"><h3 class="h3-title">Desert Antony</h3></a>
                            <span>Your Trainer</span>
                            <p>Aenean convallis pellentesque condimentum. Nunc placerat nibh sit amet pretium dignissim. Mauris placerat diam accumsan convallis dictum.</p>
                            <a href="team-detail.html" class="sec-btn-link">Read More</a>
                        </div>
                    </div>
                    <div class="class-detail-time wow fadeInUp" data-wow-delay=".5s">
                        <h3 class="h3-title">Classes Time</h3>
                        <div class="line"></div>
                        <div class="class-detail-time-main-box">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="class-detail-time-box">
                                        <span>Monday</span>
                                        <span>8:00 - 9:00 am</span>
                                        <span>Desert Antony</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="class-detail-time-box">
                                        <span>Tuesday</span>
                                        <span>8:00 - 9:00 am</span>
                                        <span>Desert Antony</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="class-detail-time-box">
                                        <span>Wednesday</span>
                                        <span>8:00 - 9:00 am</span>
                                        <span>Desert Antony</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="class-detail-time-box">
                                        <span>Thursday</span>
                                        <span>8:00 - 9:00 am</span>
                                        <span>Desert Antony</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="class-detail-time-box">
                                        <span>Friday</span>
                                        <span>8:00 - 9:00 am</span>
                                        <span>Desert Antony</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="class-detail-time-box">
                                        <span>Sunday</span>
                                        <span>8:00 - 9:00 am</span>
                                        <span>Desert Antony</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Class Detail Info End-->
        </div>
    </div>
</section>
<!--Class Detail End-->
@endsection