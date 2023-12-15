@extends('layouts.app')
@section('title',$title)
@section('content')
<style>
    b{
        text-align: justify;
    }
</style>
<div id="postloader"></div>
<section class="content-header">
    <h1>{{$title}}</h1>
</section>
<section class="content animated fadeInRight">
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Gallery Title</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Gallery Image</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <form method="post" action="{{route('update_home_gallery')}}">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Gallery Title <span style="color: red">*</span></label>
                                            <div class="form-group">
                                                <input type="hidden" name="task_id" value="<?= $getgallery->id ?>">
                                                <input type="hidden" name="task_type" value="Title">
                                                <input class="form-control inputnumber" type="text" name="title" value="<?= $getgallery->title ?>" required="">
                                            </div> 
                                        </div>
                                    </div><br>
                                    <div style="text-align: center">
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-check-circle"></i> Update</button>
                                    </div>   
                                </form>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <form method="post" action="{{route('update_home_gallery')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Gallery Image <span style="color: red">*</span></label>
                                            <div class="form-group">
                                                <input type="hidden" name="task_id" value="<?= $getgallery->id ?>">
                                                <input type="hidden" name="old_image" value="<?= $getgallery->image ?>">
                                                <input type="hidden" name="task_type" value="Image">
                                                <input class="form-control inputnumber" type="file" accept="image/jpg,image/jpeg,image/png" name="filename" onchange="getImage(this);" required="">
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <img src="<?= URL::to($getgallery->image) ?>" style="height:200px;border-radius:10px;border-radius: 15px;border:5px solid #3c8dbc" id="blah">
                                        </div>
                                    </div><br>
                                    <div style="text-align: center">
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-check-circle"></i> Update</button>
                                    </div>   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function getImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            document.getElementById('showPhotobtn').style.display = 'block';
        } else {
            document.getElementById('showPhotobtn').style.display = 'none';
        }
    }
</script>
<script>
    $(document).ready(function () {
        $('#manage_galleries').addClass('active');
    });
</script>
@endsection