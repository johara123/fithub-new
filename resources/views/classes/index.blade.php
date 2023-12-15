@extends('layouts.app')
@section('title',$title)
@section('content')
<section class="content-header">
    <h1>Manage {{$title}}</h1>
    <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
</section>
<section class="content animated fadeInRight">
    <div class="box-group" id="accordion">
        <div class="panel" style="border: none">
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="box-body" style="border: 2px solid #3c8dbc">
                    <form method="post" action="{{route('saveclass')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-4">
                                <label>Class Name <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Enter GYM Class Name" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" required="">
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <label>Class Photo <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="file" onchange="readURL(this);" name="gymphoto" placeholder="Enter GYM Class Name" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" required="">
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <img src="" style="border: 5px solid #000;width: 250px;height: 80px;"id="blah">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description <span style="color: red;font-weight: bold">*</span></label>
                                    <textarea id="editorone" name="description"></textarea>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Features <span style="color: red">*</span></label>
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr class="tableheader">
                                                <th style="text-align: center">S/N</th>
                                                <th style="text-align: center">Features</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align: center;" id="coreItems">
                                            <tr>
                                                <td class="serial_no">1</td>
                                                <td><input type="text" name="featuredesco[]" class="form-control inputnumber" placeholder="Enter Class Feture" required=""></td>
                                                <td><button  class="btn btn-info" type="button" id="addMore" style="border-radius:10px"><i class="fa fa-plus"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
                            <th style="text-align: center">S/N</th>
                            <th style="text-align: center">Class</th>
                            <th style="text-align: center">Photo</th>
                            <th style="text-align: center">Features</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($gymclasses as $value) {
                            $features = explode('$$', $value->features);
                            ?>
                            <tr>
                                <td style="text-align: center"><?= $i ?></td>
                                <td style="text-align: center"><?= $value->name ?></td>
                                <td style="text-align: center"><img src="<?= URL::to($value->photo) ?>"></td>
                                <td style="text-align: left">
                                    <?php
                                    $i = 1;
                                    foreach ($features as $fvalue) {
                                        echo $i . '#' . $fvalue . '<br>';
                                        $i++;
                                    }
                                    ?>
                                </td>
                                <td style="text-align: center">  
                                    <button class="btn btn-o btn-primary" onclick="window.location = '<?= URL::to('edit_class_data?id=' . $value->id) ?>'" style="text-align: center;border-radius: 10px;" title="Edit"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-o btn-danger deletemember" id="<?= $value->id ?>" style="text-align: center;border-radius: 10px;" title="Delete"><i class="fa fa-trash-o"></i></button>
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
            tr += '<td><input type="text" name="featuredesco[]" class="form-control inputnumber" placeholder="Enter Class Feture" required=""></td>';
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
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.deletemember', function () {
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
                    swal(window.location.href = "{{URL::to('delete_class_data')}}" + '/' + id);
                } else {
                    swal("Cancelled");
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#gymclass').addClass('active');
    });
</script>
@endsection