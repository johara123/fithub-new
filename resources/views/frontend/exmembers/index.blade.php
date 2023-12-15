@extends('layouts.index')
@section('content')
@section('title','Former Members')
<!--Banner Start-->
<section class="main-inner-banner jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url(assets/images/team-in-banner.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-in-title">
                    <h1 class="h1-title">Former Members</h1>
                </div>
                <div class="banner-breadcum">
                    <ul>
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li><a href="javascript:void(0)">Team</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Banner End-->
<!--Team Start-->
<section class="main-team-in">
    <div class="container">
        <div class="row">
            @foreach($getcustomers as $value)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="team-box wow fadeInDown" data-wow-delay=".5s">
                    <div class="team-img-box team-border-two">
                        <div class="team-img">
                            <img src="{{URL::to($value->photo)}}" alt="Ex-GYM Member">
                        </div>
                    </div>
                    <div class="team-content">
                        <a href="{{URL::to('former-member-review?id='.$value->id)}}"><h3 class="h3-title team-text-color">{{$value->fname}} {{$value->lname}}</h3></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection