@extends('layouts.app')
@section('title','Admin Dashboard')
@section('content')
<section class="content-header animated fadeInDown">
    <h1>Admin Dashboard</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-4 col-xs-6 animated fadeInDown">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><?= $total ?></h3>
                    <h4 style="font-size: 25px;">Total Members</h4>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
        </div>
        <div class="col-lg-4 col-xs-6 animated fadeInDown">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><?= $actives ?></h3>
                    <h4 style="font-size: 25px;">Active Members</h4>
                </div>
                <div class="icon">
                    <i class="fa fa-user-plus"></i>
                </div>
                <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
        </div>
        <div class="col-lg-4 col-xs-6 animated fadeInDown">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><?= $inactives ?></h3>
                    <h4 style="font-size: 25px;">Inactive Members</h4>
                </div>
                <div class="icon">
                    <i class="fa fa-user-times"></i>
                </div>
                <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-lg-4 col-xs-6 animated fadeInDown">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><?= $newmembers ?></h3>
                    <h4 style="font-size: 25px;">New Registrations</h4>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
        </div>
        <div class="col-lg-4 col-xs-6 animated fadeInDown">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><?= $totalclass ?></h3>
                    <h4 style="font-size: 25px;">Total Class</h4>
                </div>
                <div class="icon">
                    <i class="fa fa-table"></i>
                </div>
                <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
        </div>
        <div class="col-lg-4 col-xs-6 animated fadeInDown">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><?= $totaltrainer ?></h3>
                    <h4 style="font-size: 25px;">Total Trainer</h4>
                </div>
                <div class="icon">
                    <i class="fa fa-user-secret"></i>
                </div>
                <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
        </div>
    </div> 
</section>
<script>
    $(document).ready(function () {
        $('#dashboard').addClass('active');
    });
</script>
@endsection