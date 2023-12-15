@extends('layouts.app')
@section('title',$title)
@section('content')
<?php

use App\Models\Schedule;
?>
<section class="content-header">
    <h1>Manage {{$title}}</h1>
    <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
</section>
<section class="content animated fadeInRight">
    <div class="box-group" id="accordion">
        <div class="panel" style="border: none">
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="box-body" style="border: 2px solid #3c8dbc">
                    <form method="post" action="{{route('makeschedule')}}">
                        {{csrf_field()}}
                        <div class="row"> 
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <label>Days <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <select name="day" class="form-control inputnumber" required="">
                                        <option value="">Select Day</option>
                                        @foreach($getweekdays as $value)
                                        <option value="{{$value->day}}">{{$value->day}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-12">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr class="tableheader">
                                            <th style="text-align: center">S/N</th>
                                            <th style="text-align: center">Time</th>
                                            <th style="text-align: center">Class</th>
                                            <th style="text-align: center">Trainer</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center;" id="moreItems">
                                        <tr>
                                            <td class="serial_no">1</td>
                                            <td>
                                                <select name="time[]" class="form-control inputnumber" required="">
                                                    <option value="">Select Time</option>
                                                    @foreach($getgymtimes as $value)
                                                    <option value="{{$value->name}}">{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>                                      
                                            <td>
                                                <select name="class_id[]" class="form-control inputnumber" required="">
                                                    <option value="">Select Class</option>
                                                    @foreach($getgymclass as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>                                      
                                            <td>
                                                <select name="trainer_id[]" class="form-control inputnumber" required="">
                                                    <option value="">Select Trainer</option>
                                                    @foreach($gettrainers as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>                                      
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
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-solid">
                        <div class="box-body">
                            <div class="box-group" id="accordion">
                                <?php
                                $i = 1;
                                foreach ($getweekdays as $days) {
                                    ?>
                                    <div class="panel box box-primary">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?= $i ?>">
                                                    <?= $days->day ?> <i class="fa fa-arrow-down"></i>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse_<?= $i ?>" class="panel-collapse collapse">
                                            <div class="box-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                                                <th style="text-align: center">S/N</th>
                                                                <th style="text-align: center">Class</th>
                                                                <th style="text-align: center">Trainer</th>
                                                                <th style="text-align: center">Time</th>
                                                                <th style="text-align: center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $j = 1;
                                                            $getschedules = Schedule::with('class', 'trainer')->where('day', $days->day)->get();
                                                            foreach ($getschedules as $value) {
                                                                ?>
                                                                <tr>
                                                                    <td style="text-align: center"><?= $j ?></td>
                                                                    <td style="text-align: center"><?= $value->class->name ?></td>
                                                                    <td style="text-align: center"><?= $value->trainer->name ?></td>
                                                                    <td style="text-align: center"><?= $value->time ?></td>
                                                                    <td style="text-align: center">
                                                                        <button class="btn btn-o btn-primary editschedule" value="<?= $value->id ?>" style="text-align: center;border-radius: 10px;" title="Edit"><i class="fa fa-edit"></i></button>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $j++;
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content" style="border:5px solid #3c8dbc">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center">Update <?= $title ?></h3>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('updateschedule') }}">
                    {{csrf_field()}}
                    <div class="row">
                        <input type="hidden" name="dataid" id="set_dataid">
                        <div class="col-md-6">
                            <label>Time <span style="color: red">*</span></label>
                            <div class="form-group">
                                <select name="time" id="set_time" class="form-control inputnumber" required="">
                                    <option value="" disabled="" selected="">Select Time</option>
                                    @foreach($getgymtimes as $value)
                                    <option value="{{$value->name}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <label>Class <span style="color: red">*</span></label>
                            <div class="form-group">
                                <select name="class_id" id="set_class_id" class="form-control inputnumber" required="">
                                    <option value="" disabled="" selected="">Select Class</option>
                                    @foreach($getgymclass as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Trainers <span style="color: red">*</span></label>
                            <div class="form-group">
                                <select name="trainer_id" id="set_trainer_id" class="form-control inputnumber" required="">
                                    <option value="" disabled="" selected="">Select Trainer</option>
                                    @foreach($gettrainers as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                    </div><br>
                    <div style="text-align: center">
                        <button type="button" class="btn btn-warning" data-dismiss="modal" style="border-radius: 10px;margin-right: 20px;"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" id="submeetButton" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-check-circle-o"></i> Update</button>
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
                    '<td>' +
                    '<select name="time[]" class="form-control inputnumber" required="">' +
                    '<option value="">Select Time</option>' +
                    @foreach($getgymtimes as $value)
            '<option value="{{$value->name}}">{{$value->name}}</option>' +
                    @endforeach
                    '</select>' +
                    '</td>' +
                    '<td>' +
                    '<select name="class_id[]" class="form-control inputnumber" required="">' +
                    '<option value="">Select Class</option>' +
                    @foreach($getgymclass as $value)
            '<option value="{{$value->id}}">{{$value->name}}</option>' +
                    @endforeach
                    '</select>' +
                    '</td>' +
                    '<td>' +
                    '<select name="trainer_id[]" class="form-control inputnumber" required="">' +
                    '<option value="">Select Trainer</option>' +
                    @foreach($gettrainers as $value)
            '<option value="{{$value->id}}">{{$value->name}}</option>' +
                    @endforeach
                    '</select>' +
                    '</td>' +
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
        $(document).on('click', '.editschedule', function () {
            var id = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{URL::to("get_schedule_data")}}',
                data: {id: id},
                dataType: 'json',
                success: function (data) {
                    $("#set_dataid").val(data.id);
                    $("#set_time").val(data.time);
                    $("#set_class_id").val(data.class_id);
                    $("#set_trainer_id").val(data.trainer_id);
                    $("#editModal").modal('show');
                },
                error: function () {
                    alert('Something is wrong !');
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#gymschedules').addClass('active');
    });
</script>
@endsection