@extends('layouts.index')
@section('content')
@section('title',$title)
<!--Banner Start-->
<section class="main-inner-banner jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url(assets/images/classes-in-banner.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-in-title">
                    <h1 class="h1-title">Our Classes</h1>
                </div>
                <div class="banner-breadcum">
                    <ul>
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li><a href="javascript:void(0)">Classes</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Banner End-->
<!--Classes Start-->
<section class="main-classes-in">
    <div class="container">
        <div class="row" id="counter">
            @foreach($gymclasses as $value)
            <div class="col-lg-4 col-md-6">
                <div class="class-box wow fadeInUp" data-wow-delay=".5s">
                    <div class="class-img">
                        <img src="{{URL::to($value->photo)}}" alt="Class">
                    </div>
                    <div class="class-box-contant">
                        <div class="class-box-title">
                            <div class="class-box-icon">
                                <!--<img src="assets/images/class-icon4.png" alt="Icon">-->
                            </div>
                            <a href="{{URL::to('gym-class/'.$value->slug)}}"><h3 class="h3-title">{{$value->name}}</h3></a>
                            <!--                            <a href="{{URL::to('viewclass?slug='.$value->slug)}}"><h3 class="h3-title">{{$value->name}}</h3></a>-->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection