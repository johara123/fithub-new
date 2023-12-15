@extends('layouts.index')
@section('content')
@section('title',$title)
<section class="main-inner-banner jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url({{asset('/')}}/public/assets/images/classes-in-banner.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-in-title">
                    <h1 class="h1-title">{{$gymclasse->class->name}}</h1>
                </div>
                <div class="banner-breadcum">
                    <ul>
                        <li><a href="javascript:void(0);">Home</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li><a href="{{URL::to('classes')}}">Classes</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li><a href="javascript:void(0);">{{$gymclasse->class->name}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="main-team-detail-in">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="team-border-two wow fadeInUp" data-wow-delay=".5s">
                    <img src="{{URL::to($gymclasse->class->photo)}}" alt="{{$gymclasse->class->name}}">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="team-detail-content">
                    <h3 class="h3-title">Description</h3>
                    <p>{!!$gymclasse->class->description !!}</p>
                    <div class="line"></div>
                    <div class="personal-skills">
                        <div class="row">
                            <div class="col-lg-10">
                                <h3 class="h3-title">Features</h3>
                                <div class="skill-progress">
                                    <?php
                                    $features = explode('$$', $gymclasse->class->features);
                                    foreach ($features as $value) {
                                        ?>
                                        <div class="skill-bar-box">
                                            <h3 class="h3-title"># <?= $value ?></h3>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="class-detail-trainer-box wow fadeInUp" data-wow-delay=".5s">
                    <div class="class-trainer-box-img">
                        <img src="{{URL::to($gymclasse->trainer->photo)}}" class="rounded-circle" alt="Trainer">
                    </div>
                    <div class="class-trainer-box-text">
                        <h3 class="h3-title">{{$gymclasse->trainer->name}}</h3>
                        <span>Trainer</span><br><br>
                        <a href="{{URL::to('view-trainer-info?id='.$gymclasse->trainer_id)}}" target="_blank" class="sec-btn-link">Read More</a>
                    </div>
                </div>
                <div class="class-detail-time wow fadeInUp" data-wow-delay=".5s">
                    <h3 class="h3-title">Class Time</h3>
                    <div class="line"></div>
                    <div class="class-detail-time-main-box">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="class-detail-time-box">
                                    <span>{{$gymclasse->day}}</span>
                                    <span>{{$gymclasse->time}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection