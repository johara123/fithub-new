@extends('layouts.index')
@section('content')
@section('title',$title)
<!--Banner Start-->
<?php

use App\Models\Schedule;
?>
<section class="main-inner-banner jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url(assets/images/class-detail-in-banner.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-in-title">
                    <h1 class="h1-title">GYM Schedules</h1>
                </div>
                <div class="banner-breadcum">
                    <ul>
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li><a href="javascript:void(0)">Schedule</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="main-schedule" id="schedule">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="schedule-title">
                    <div class="subtitle">
                        <h2 class="h2-subtitle">Our Schedule</h2>
                    </div>
                    <h2 class="h2-title">Check Our  Classes Schedule</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="main-schedule-box wow fadeInUp" data-wow-delay=".5s">
                    <div class="schedule-box">
                        <div class="schedule-time-box">
                            <ul>
                                <li><img src="assets/images/clock-1.png" alt="Clock"></li>
                                @foreach($getgymtimes as $value)
                                <li><h3 class="h3-title">{{$value->name}}</h3></li>
                                @endforeach                                
                            </ul>
                        </div>
                        @foreach($getweekdays as $days)
                        <div class="schedule-class-box">
                            <ul>
                                <li><h3 class="h3-title"><?= $days->day ?></h3></li>
                                <?php
                                $getschedules = Schedule::with('class', 'trainer')->where('day', $days->day)->get();
                                foreach ($getschedules as $value) {
                                    ?>
                                    <li>
                                        <div class="schedule-class-text">
                                            <a href="{{URL::to('view-class-schedule/'.$value->id)}}">
                                                <h3 class="h3-title"><?= $value->class->name ?></h3>
                                                <span><?= $value->trainer->name ?></span>
                                            </a>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        @endforeach     
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection