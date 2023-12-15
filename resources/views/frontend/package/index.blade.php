@extends('layouts.index')
@section('content')
@section('title',$title)
<!--Banner Start-->
<section class="main-inner-banner jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url(assets/images/pricing-in-banner.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-in-title">
                    <h1 class="h1-title">Pricing Table</h1>
                </div>
                <div class="banner-breadcum">
                    <ul>
                        <li><a href="<?= URL::to('/') ?>">Home</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li><a href="javascript:void(0)">Pricing Table</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Banner End-->
<!--Pricing Start-->
<section class="main-pricing">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pricing-title">
                    <div class="subtitle">
                        <h2 class="h2-subtitle">Pricing Table</h2>
                    </div>
                    <h2 class="h2-title">Choose Your Pricing Plan</h2>
                </div>
            </div>
        </div>
        <div class="row pricing-slider">
            @foreach($getplandata as $value)
            <div class="col-lg-4">
                <div class="pricing-box wow fadeInDown" data-wow-delay=".5s">
                    <div class="pricing-title-box pricing-two">
                        <h3 class="h3-title">{{$value->name}}</h3>
                        <h2 class="h2-title">&#2547 {{$value->extra}}<span>/Month</span></h2>
                    </div>
                    <div class="pricing-content-box">
                        <div class="pricing-content">
                            <div class="pricing-point">
                                <?php
                                $singledata = DB::table('packages')->leftJoin('singledata', 'packages.equipment_id', '=', 'singledata.id')->where('plan_id', $value->id)->limit(5)->get();
                                ?>
                                <ul>
                                    @foreach($singledata as $svalue)
                                    <li>
                                        <img src="assets/images/check.png" alt="Check">
                                        <p>{{$svalue->name}}</p>
                                    </li>
                                    @endforeach
                                    <li>
                                        <img src="assets/images/check.png" alt="Check">
                                        <p>....................Etc.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="{{URL::to('registration?plan='.$value->id)}}" class="sec-btn">Join Now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection