@extends('layouts.app')
@section('title',$title)
@section('content')
<?php
$path = Request::path();
?>
<style>
    b{
        text-align: justify;
    }
</style>
<div id="postloader"></div>
<section class="content-header">
    <h1>Manage {{$title}}</h1>
    @if($path!='presetdata/time')
    <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
    @endif
</section>
<section class="content animated fadeInRight">
    <div class="box-group" id="accordion">
        <div class="panel" style="border: none">
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="box-body" style="border: 2px solid #3c8dbc">
                    <form method="post" action="{{route('saveupdate_presetdata')}}">
                        {{csrf_field()}}
                        <div class="row"> 
                            <div class="col-md-12">
                                <input type="hidden" name="datatype" value="<?= $datatype ?>">
                                <input type="hidden" name="datafor" value="Saved">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr class="tableheader">
                                            <th style="text-align: center">S/N</th>
                                            <th style="text-align: center">Data Name</th>
                                            <th style="text-align: center">Extra Data</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center;" id="moreItems">
                                        <tr>
                                            <td class="serial_no">1</td>
                                            <td><input type="text" name="dataname[]" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" placeholder="Enter Data Name" required=""></td>                                      
                                            <td><input type="text" name="extradata[]" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" value="N/A" required=""></td>                                      
                                            <td></td>                                       
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div style="text-align: center">
                            <button  class="btn btn-info" type="button" id="addMore" style="border-radius:10px;margin-right: 20px"><i class="fa fa-plus"></i> Add More</button>
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
                            <th style="text-align: center">Data Name</th>
                            <th style="text-align: center">Extra Data</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($getpresetdata as $value) {
                            ?>
                            <tr>
                                <td style="text-align: center"><?= $i ?></td>
                                <td style="text-align: center"><?= $value->name ?></td>
                                <td style="text-align: center"><?= $value->extra ?></td>
                                <td style="text-align: center">      
                                    <button class="btn btn-o btn-primary editPresetdata" id="<?= $value->id ?>" style="text-align: center;border-radius: 10px;"><i class="fa fa-edit"></i> Edit</button>
                                    @if($path!='presetdata/time')
                                    <button class="btn btn-o btn-danger deletePresetdata" id="<?= $value->id ?>" style="text-align: center;border-radius: 10px;"><i class="fa fa-trash-o"></i> Delete</button>
                                    @endif
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
<div class="modal fade" id="updateModal">
    <div class="modal-dialog">
        <div class="modal-content" style="border:5px solid #3c8dbc">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center">Update <?= ucwords($datatype) ?> Data</h3>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('saveupdate_presetdata') }}">
                    {{csrf_field()}}
                    <div class="row">
                        <input type="hidden" name="datatype" value="<?= $datatype ?>">
                        <input type="hidden" name="dataid" id="setdataid">
                        <input type="hidden" name="datafor" value="Updated">
                        <div class="col-md-12">
                            <label>Data Name <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="text" name="dataname" id="set_dataname" class="form-control inputnumber" required="">
                            </div> 
                        </div>
                        <div class="col-md-12">
                            <label>Extra Name <span style="color: red">*</span></label>
                            <div class="form-group">
                                <input type="text" name="extradata" id="set_extradata" class="form-control inputnumber" required="">
                            </div> 
                        </div>
                    </div>
                    <div style="text-align: center">
                        <button type="submit" id="submeetButton" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;margin-right: 20px;"><i class="fa fa-check-circle-o"></i> Update</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" style="border-radius: 10px;"><i class="fa fa-times"></i> Close</button>
                    </div>     
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#addMore").click(function () {
            var n = ($('#moreItems tr').length - 0) + 1;
            var tr = '<tr>' +
                    '<td class="serial_no">' + n + '</td>' +
                    '<td><input type="text" name="dataname[]" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" placeholder="Enter Name" required=""></td>' +
                    '<td><input type="text" name="extradata[]" class="form-control" style="border-radius:10px;border:1px solid #3c8dbc;" value="N/A" required=""></td>' +
                    '<td><button  class="btn btn-danger remCF" style="border-radius:10px;"><i class="fa fa-trash-o"></i></button></td>' +
                    '</tr>';
            $("#moreItems").append(tr);
        });
        $(document).delegate('button.remCF', 'click', function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
            $('#moreItems tr').each(function (index) {
                $(this).find('.serial_no').html(index + 1);
            });
            return true;
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.editPresetdata', function () {
            var id = $(this).attr('id');
            $.get('<?= URL::to("get_single_presetdata?id=") ?>' + id, function (data) {
                $('#setdataid').val(id);
                $('#set_dataname').val(data.name);
                $('#set_extradata').val(data.extra);
                $('#updateModal').modal('show');
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.deletePresetdata', function () {
            var id = $(this).attr('id');
            var type="<?=$datatype?>";
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
                    swal(window.location.href = "{{URL::to('delete_setting_data?id=')}}" + id+'&type='+type);
                } else {
                    swal("Cancelled");
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#settings').addClass('active');
        $('#sub_<?= $datatype ?>').addClass('active');
    });
</script>
@endsection