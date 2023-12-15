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
    <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
</section>
<section class="content animated fadeInRight">
    <div class="box-group" id="accordion">
        <div class="panel" style="border: none">
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="box-body" style="border: 2px solid #3c8dbc">
                    <form method="post" action="{{route('save_home_gallery')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-12">
                                <label>Gallery Title <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input class="form-control inputnumber" type="text" name="title" placeholder="Enter Gallery Title" required="">
                                </div> 
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Gallery Image <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input class="form-control inputnumber" type="file" accept="image/jpg,image/jpeg,image/png" name="filename" onchange="getImage(this);" required="">
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <img src="https://placehold.co/600x600" style="height:200px;border-radius:10px;border-radius: 15px;border:5px solid #3c8dbc" id="blah">
                            </div>
                        </div><br>
                        <div style="text-align: center">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-save"></i> Save</button>
                        </div>   
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <div class="table-responsive">
                <table data-page-length='100' class="table table-bordered table-striped getTable">
                    <thead>
                        <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                            <th style="text-align: ">S/N</th>
                            <th style="text-align:center">Title</th>
                            <th style="text-align:center">Image</th>
                            <th style="text-align:center">Status</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($getgalleries as $value) {
                            ?>
                            <tr>
                                <td style="text-align: center"><?= $i ?></td>
                                <td style="text-align:left"><?= $value->title ?></td>
                                <td style="text-align:left"><img src="<?= URL::to($value->image) ?>" style="height: 100px;width: 300px"></td>
                                @if($value->status=='1')
                                <td style="text-align:center"><span style="background:green;padding: 10px;border-radius: 10px;color: #fff">Published</span></td>
                                @else
                                <td style="text-align:center"><span style="background:red;padding: 10px;border-radius: 10px;color: #fff">Unpublished</span></td>
                                @endif
                                <td style="text-align: center">   
                                    @if($value->status=='1')
                                    <button class="btn btn-o btn-success statuschange" id="<?= $value->id ?>" value="0" style="text-align: center;border-radius: 10px;" title="Unpublished"><i class="fa fa-eye"></i></button>
                                    @else
                                    <button class="btn btn-o btn-danger statuschange" id="<?= $value->id ?>" value="1" style="text-align: center;border-radius: 10px;" title="Published"><i class="fa fa-eye-slash"></i></button>
                                    @endif
                                    <a href="{{URL::to('edit_gallery_info/'.$value->id)}}" class="btn btn-o btn-info" style="text-align: center;border-radius: 10px;"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-o btn-danger deletegallery" id="<?= $value->id ?>" style="text-align: center;border-radius: 10px;"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
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
        $(document).on('click', '.statuschange', function () {
            var id = $(this).attr('id');
            var value = $(this).val();
            swal({
                title: "Are you sure ?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function (isConfirm) {
                if (isConfirm) {
                    swal(window.location.href = "{{URL::to('/change_home_gallery_status?id=')}}" + id + '&value=' + value);
                } else {
                    swal("Cancelled");
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.deletegallery', function () {
            var id = $(this).attr('id');
            swal({
                title: "Are you sure ?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function (isConfirm) {
                if (isConfirm) {
                    swal(window.location.href = "{{URL::to('/delete_home_gallery_image')}}" + "/" + id);
                } else {
                    swal("Cancelled");
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#manage_galleries').addClass('active');
    });
</script>
@endsection