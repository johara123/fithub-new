@extends('layouts.app')
@section('title',$title)
@section('content')
<section class="content-header animated fadeInDown">
    <h1><?=$title?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-4 col-xs-6 animated fadeInDown">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>0</h3>
                    <h4 style="font-size: 25px;">Total Post</h4>
                </div>
                <div class="icon">
                    <i class="fa fa-cubes"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-xs-6 animated fadeInDown">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>0</h3>
                    <h4 style="font-size: 25px;">Pending Post</h4>
                </div>
                <div class="icon">
                    <i class="fa fa-recycle"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-xs-6 animated fadeInDown">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>0</h3>
                    <h4 style="font-size: 25px;">Approved Post</h4>
                </div>
                <div class="icon">
                    <i class="fa fa-check-circle-o"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-xs-6 animated fadeInDown">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>0</h3>
                    <h4 style="font-size: 25px;">Total Comments</h4>
                </div>
                <div class="icon">
                    <i class="fa comment-o"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-xs-6 animated fadeInDown">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>0</h3>
                    <h4 style="font-size: 25px;">Total Reply</h4>
                </div>
                <div class="icon">
                    <i class="fa fa-envelope"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div> 
</section>
<script>
    $(document).ready(function () {
        $('#authorDashboard').addClass('active');
    });
</script>
@endsection