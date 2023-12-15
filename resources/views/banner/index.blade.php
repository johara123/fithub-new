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
                    <form method="post" action="{{route('save_home_banner')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <label>Home Banner (As Video) <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input class="form-control inputnumber" type="file" accept="video/mp4" name="filelink" required="">
                                </div> 
                            </div>
                            <div class="col-md-2"></div>
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
                            <th style="text-align:center">File</th>
                            <th style="text-align:center">Status</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($homebanners as $value) {
                            ?>
                            <tr>
                                <td style="text-align: center"><?= $i ?></td>
                                <td style="text-align:left">
                                    <video autoplay muted loop style="width:200px">
                                        <source  src="<?= URL::to($value->filelink) ?>" type="video/mp4" /> 
                                    </video>
                                </td>
                                @if($value->status=='1')
                                <td style="text-align:center"><span style="background:green;padding: 10px;border-radius: 10px;color: #fff">Active</span></td>
                                @else
                                <td style="text-align:center"><span style="background:red;padding: 10px;border-radius: 10px;color: #fff">Inactive</span></td>
                                @endif
                                <td style="text-align: center">   
                                    @if($value->status=='1')
                                    <button class="btn btn-o btn-success statuschange" id="<?= $value->id ?>" value="0" style="text-align: center;border-radius: 10px;" title="Inactive"><i class="fa fa-lock"></i> Active</button>
                                    @else
                                    <button class="btn btn-o btn-danger statuschange" id="<?= $value->id ?>" value="1" style="text-align: center;border-radius: 10px;" title="Active"><i class="fa fa-unlock"></i> Inactive</button>
                                    @endif
                                    <button class="btn btn-o btn-danger deletebanner" id="<?= $value->id ?>" style="text-align: center;border-radius: 10px;"><i class="fa fa-trash"></i> Delete</button>
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
                    swal(window.location.href = "{{URL::to('/change_home_banner_status?id=')}}" + id + '&value=' + value);
                } else {
                    swal("Cancelled");
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.deletebanner', function () {
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
                    swal(window.location.href = "{{URL::to('/delete_home_banner')}}" + "/" + id);
                } else {
                    swal("Cancelled");
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#homebanner').addClass('active');
    });
</script>
@endsection