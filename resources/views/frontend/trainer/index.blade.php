@extends('layouts.index')
@section('content')
@section('title',$title)
<!--Banner Start-->
<section class="main-inner-banner jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url(assets/images/team-in-banner.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-in-title">
                    <h1 class="h1-title">Our Team</h1>
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
            @foreach($gymtraniners as $value)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="team-box wow fadeInDown" data-wow-delay=".5s">
                    <div class="team-img-box team-border-two">
                        <div class="team-img">
                            <img src="{{URL::to($value->photo)}}" alt="Trainer">
                        </div>
                    </div>
                    <div class="team-content">
                        <a href="{{URL::to('view-trainer-info?id='.$value->id)}}"><h3 class="h3-title team-text-color">{{$value->name}}</h3></a>
                        <span>{{$value->post}}</span>
                        <div class="team-social">
                            <ul>
                                <?php
                                $social_link = explode('$$', $value->social_link);
                                $social_icon = explode('$$', $value->social_icon);
                                foreach ($social_link as $key => $slink) {
                                    ?>
                                    <li>
                                        <a href="<?= $slink ?>"><i class="fa fa-<?= $social_icon[$key] ?>" aria-hidden="true"></i></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection