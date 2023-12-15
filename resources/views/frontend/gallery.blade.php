@extends('layouts.index')
@section('content')
@section('title',$title)
<!--Banner Start-->
<style>
    .gallery a img {
        padding: 5px;
        border:5px solid #0089cf;
        -webkit-transition: -webkit-transform .15s ease;
        -moz-transition: -moz-transform .15s ease;
        -o-transition: -o-transform .15s ease;
        -ms-transition: -ms-transform .15s ease;
        transition: transform .15s ease;
        position: relative;
    }
    .clear {
        clear: both;
    }
    a {
        color: #009688;
        text-decoration: none;
    }
    a:hover {
        color: #01695f;
        text-decoration: none;
    }
</style>
<link rel="stylesheet" href="{{asset('/')}}public/lightbox.css">
<section class="main-inner-banner jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url(assets/images/blog-detail-in-banner.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-in-title">
                    <h1 class="h1-title">GYM Gallery</h1>
                </div>
                <div class="banner-breadcum">
                    <ul>
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li><a href="javascript:void(0)">Gallery</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="main-blog-grid-in">
    <div class="container">
        <div class="row">
            @foreach($getgalleries as $value)
            <div class="col-lg-4 col-md-6">
                <div class="blog-box wow fadeInUp" data-wow-delay=".5s">
                    <div class="blog-img">
                        <div class="gallery">
                            <a href="{{URL::to($value->image)}}" class="big">
                                <img src="{{URL::to($value->image)}}" alt="" title="<?= $value->title ?>" />
                            </a>
                        </div>
                    </div>
                    <div class="blog-content">
                        <h3 class="h3-title">{{$value->title}}</h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<script src="{{asset('/')}}public/lightbox.js"></script>
<script>
(function () {
    var $gallery = new SimpleLightbox('.gallery a', {});
})();
</script>
@endsection