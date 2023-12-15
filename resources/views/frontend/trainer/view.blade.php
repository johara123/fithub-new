@extends('layouts.index')
@section('content')
@section('title',$title)
<section class="main-inner-banner jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url(public/images/background-photo.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-in-title">
                    <h1 class="h1-title">{{$gymtraniner->name}}</h1>
                </div>
                <div class="banner-breadcum">
                    <ul>
                        <li><a href="javascript:void(0);">Home</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li><a href="{{URL::to('trainers')}}">Team</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li><a href="javascript:void(0);">{{$gymtraniner->name}}</a></li>
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
                        <img src="{{URL::to($gymtraniner->photo)}}" alt="Trainer">
                    </div>
                </div>
                <div class="trainer-detail-info-box wow fadeInUp" data-wow-delay=".7s">
                    <div class="trainer-detail-info-text-box">
                        <div class="trainer-detail-info-text">
                            <span>Joining Date:</span>
                            <span>{{$gymtraniner->joindate}}</span>
                        </div>
                        <div class="trainer-detail-info-text">
                            <span>Experience:</span>
                            <span>{{$gymtraniner->experience}}</span>
                        </div>
                    </div>
                    <div class="trainer-detail-info-text-box two">
                        <div class="trainer-detail-info-text">
                            <span>Training:</span>
                            <span>{{$gymtraniner->post}}</span>
                        </div>
                        <div class="trainer-detail-info-text">
                            <span>Social Links</span>
                            <ul>
                                <?php
                                $social_link = explode('$$', $gymtraniner->social_link);
                                $social_icon = explode('$$', $gymtraniner->social_icon);
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
            <div class="col-lg-8">
                <div class="team-detail-content">
                    <span>{{$gymtraniner->post}}</span>
                    <p>{{$gymtraniner->about}}</p>
                    <div class="line"></div>
                    <div class="personal-skills" id="counter">
                        <h3 class="h3-title">Personal Skills</h3>
                        <div class="line"></div>
                        <div class="row" id="progress_bar">
                            <div class="col-lg-10">
                                <div class="skill-progress">
                                    <?php
                                    $skills = explode('$$', $gymtraniner->skill);
                                    foreach ($skills as $value) {
                                        ?>
                                        <div class="skill-bar-box">
                                            <h3 class="h3-title"><?= $value ?></h3>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="personal-skills" id="counter">
                        <h3 class="h3-title">Awards</h3>
                        <div class="line"></div>
                        <div class="row" id="progress_bar">
                            <div class="col-lg-10">
                                <div class="skill-progress">
                                    <?php
                                    $awards = explode('$$', $gymtraniner->award);
                                    foreach ($awards as $key => $value) {
                                        ?>
                                        <div class="skill-bar-box">
                                            <h3 class="h3-title"><?= $value ?></h3>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection