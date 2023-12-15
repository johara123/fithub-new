@extends('layouts.index')
@section('content')
@section('title',$title)
<section class="main-inner-banner jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url({{asset('/')}}/public/assets/images/classes-in-banner.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-in-title">
                    <h1 class="h1-title">{{$gymclasse->name}}</h1>
                </div>
                <div class="banner-breadcum">
                    <ul>
                        <li><a href="javascript:void(0);">Home</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li><a href="{{URL::to('classes')}}">Classes</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li><a href="javascript:void(0);">{{$gymclasse->name}}</a></li>
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
                    <img src="{{URL::to($gymclasse->photo)}}" alt="{{$gymclasse->name}}">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="team-detail-content">
                    <h3 class="h3-title">Description</h3>
                    <p>{!!$gymclasse->description !!}</p>
                    <div class="line"></div>
                    <div class="personal-skills">
                        <div class="row">
                            <div class="col-lg-10">
                                <h3 class="h3-title">Features</h3>
                                <div class="skill-progress">
                                    <?php
                                    $features = explode('$$', $gymclasse->features);
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
            </div>
        </div>
    </div>
</section>
@endsection