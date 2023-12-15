@extends('layouts.index')
@section('content')
@section('title',$title)
<section class="main-inner-banner jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url(public/images/background-photo.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-in-title">
                    <h1 class="h1-title">{{$getmemberinfo->fname}} {{$getmemberinfo->lname}}</h1>
                </div>
                <div class="banner-breadcum">
                    <ul>
                        <li><a href="javascript:void(0);">Home</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li><a href="{{URL::to('exmembers')}}">Former Members</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li><a href="javascript:void(0);">{{$getmemberinfo->fname}} {{$getmemberinfo->lname}}</a></li>
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
                <div class="team-img-box team-border-two wow fadeInUp" data-wow-delay=".5s">
                    <div class="team-img">
                        <img src="{{URL::to($getmemberinfo->photo)}}" alt="Former Member">
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="team-detail-content">
                    <span>Reviews</span>
                    <p>{{$getreviewcorner->reviews}}</p>
                    <div class="line"></div>
                    <div class="personal-skills" id="counter">
                        <h3 class="h3-title">Personal Details</h3><br>
                        <div class="trainer-detail-info-text-box">
                            <div class="trainer-detail-info-text">
                                <span style="color:#fff">GYM ID No:&nbsp {{$getreviewcorner->memberidno}}</span>
                            </div>
                        </div>
                        <div class="trainer-detail-info-text-box">
                            <div class="trainer-detail-info-text">
                                <span style="color:#fff">Contact:&nbsp {{$getmemberinfo->contact}}</span>
                            </div>
                        </div>
                        <div class="trainer-detail-info-text-box">
                            <div class="trainer-detail-info-text">
                                <span style="color:#fff">Email Address:&nbsp {{$getmemberinfo->email}}</span>
                            </div>
                        </div>
                        <div class="trainer-detail-info-text-box">
                            <div class="trainer-detail-info-text">
                                <span style="color:#fff">Address:&nbsp {{$getmemberinfo->address}}</span>
                            </div>
                        </div>
                        <div class="trainer-detail-info-text-box">
                            <div class="trainer-detail-info-text">
                                <span style="color:#fff">Occupation:&nbsp {{$getmemberinfo->occupation}}</span>
                            </div>
                        </div>
                        <div class="trainer-detail-info-text-box">
                            <div class="trainer-detail-info-text">
                                <span style="color:#fff">Weight:&nbsp {{$getmemberinfo->weight}} Kg</span>
                            </div>
                        </div>
                        <div class="trainer-detail-info-text-box">
                            <div class="trainer-detail-info-text">
                                <span style="color:#fff">Height:&nbsp {{$getmemberinfo->height}}</span>
                            </div>
                        </div>
                        <div class="trainer-detail-info-text-box">
                            <div class="trainer-detail-info-text">
                                <span style="color:#fff">Reason:&nbsp {{$getmemberinfo->reason}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection