@extends('layouts.app')
@section('title',$title)
@section('content')
<section class="content-header">
    <h1>Manage {{$title}}</h1>
<a class="btn" href="<?= URL::to('gymclass') ?>" style="border-radius:10px;float:right;margin-top:-30px;margin-left: 10px;background:#000;color: #fff"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
</section>
<section class="content animated fadeInRight">
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Class Info</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Class Photo</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <form method="post" action="{{route('updateclass')}}" name="getformdata">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Class Name <span style="color: red">*</span></label>
                                            <div class="form-group">
                                                <input type="hidden" name="dataid" value="<?= $getgymclasse->id ?>">
                                                <input type="hidden" name="datatype" value="Info">
                                                <input type="text" name="name" value="<?= $getgymclasse->name ?>" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" required="">
                                            </div> 
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description <span style="color: red;font-weight: bold">*</span></label>
                                                <textarea rows="5" id="editorone" name="description" required="">{!! $getgymclasse->description !!}</textarea>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr class="tableheader">
                                                            <th style="text-align: center">S/N</th>
                                                            <th style="text-align: center">Features</th>
                                                            <th style="text-align: center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="text-align: center;" id="coreItems">
                                                        <?php
                                                        $skills = explode('$$', $getgymclasse->features);
                                                        foreach ($skills as $key => $value) {
                                                            ?>
                                                            <tr>
                                                                <td class="serial_no">{{$key+1}}</td>
                                                                <td><input type="text" name="features[]" class="form-control inputnumber" value="<?= $value ?>" required=""></td>
                                                                <td><button class="btn btn-danger remCF" style="border-radius:10px;"><i class="fa fa-trash-o"></i></button></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <center>
                                                    <button class="btn btn-info" type="button" id="addMore" style="border-radius:10px"><i class="fa fa-plus"></i> Add More Features</button>
                                                </center>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div style="text-align: center">
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-check-circle"></i> Update</button>
                                    </div>   
                                </form>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <form method="post" action="{{route('updateclass')}}" enctype="multipart/form-data" name="getformdata">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Class Photo <span style="color: red">*</span></label>
                                            <div class="form-group">
                                                <input type="hidden" name="dataid" value="<?= $getgymclasse->id ?>">
                                                <input type="hidden" name="datatype" value="Photo">
                                                <input type="hidden" name="oldphoto" value="<?= $getgymclasse->photo ?>">
                                                <input type="file" onchange="readURL(this);" name="photo" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" required="">
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <img src="{{asset('/')}}<?= $getgymclasse->photo ?>" style="border: 5px solid #000;width: 200px;height:200px;"id="blah">
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
<script data-sample="1">
    CKEDITOR.replace('editorone', {
        height: 250,
        extraPlugins: 'colorbutton,colordialog'
    });
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script> 
<script type="text/javascript">
    $(document).ready(function () {
        $("#addMore").click(function () {
            var n = ($('#coreItems tr').length - 0) + 1;
            var tr = '';
            tr += '<tr>';
            tr += '<td class="serial_no">' + n + '</td>';
            tr += '<td><input type="text" name="features[]" class="form-control inputnumber" placeholder="Enter New Features" required=""></td>';
            tr += '<td><button  class="btn btn-danger remCF" style="border-radius:10px;"><i class="fa fa-trash-o"></i></button></td>';
            tr += '</tr>';
            $("#coreItems").append(tr);
        });
        $(document).delegate('button.remCF', 'click', function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
            $('#coreItems tr').each(function (index) {
                $(this).find('.serial_no').html(index + 1);
            });
            return true;
        });
        $(document).delegate('button.removeskill', 'click', function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
            $('#coreItemstwo tr').each(function (index) {
                $(this).find('.serial_notwo').html(index + 1);
            });
            return true;
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#gymclass').addClass('active');
    });
</script>
@endsection