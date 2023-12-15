@extends('layouts.app')
@section('title',$title)
@section('content')
<?php

use App\Models\Package;
?>
<section class="content-header">
    <h1>{{$title}}</h1>
    <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
</section>
<section class="content animated fadeInRight">
    <div class="box-group" id="accordion">
        <div class="panel" style="border: none">
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="box-body" style="border: 2px solid #3c8dbc">
                    <form method="post" action="{{route('save_dietplan')}}">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                                Members
                            </label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select style="width: 100%" name="member_id" class="form-control getSelect" required="">
                                        <option value="">Select Member</option>
                                        @foreach($getcustomers as $value)
                                        <option value="{{$value->id}}">{{$value->memberidno}} => {{$value->fname}} {{$value->lname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                                Diet Plan
                            </label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select style="width: 100%" name="diet_plan_id" class="form-control getSelect" required="">
                                        <option value="">Select PLan</option>
                                        @foreach($getdietplantypes as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h3>Diet Plan Eating Chart List</h3>
                        <div class="form-group row">
                            <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                                Early Morning Eating
                            </label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="early_morning" class="form-control inputnumber" placeholder="Enter Early Morning" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                                Breakfast
                            </label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="breakfast" class="form-control inputnumber" placeholder="Enter Breakfast" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                                Mid Meal
                            </label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="mid_meal" class="form-control inputnumber" placeholder="Enter Mid Meal" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                                Lunch
                            </label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="lunch" class="form-control inputnumber" placeholder="Enter Lunch" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                                Before Workout
                            </label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="before_workout" class="form-control inputnumber" placeholder="Enter Before Workout" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                                After Workout
                            </label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="after_workout" class="form-control inputnumber" placeholder="Enter Before Workout" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                                Dinner
                            </label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="dinner" class="form-control inputnumber" placeholder="Enter Dinner" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4"><i class="fa fa-hand-o-right" style="color: #000" aria-hidden="true"></i>
                                Before Sleep/Bed Time
                            </label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="bed_time" class="form-control inputnumber" placeholder="Enter Before Sleep/Bed Time" required="">
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
                <table class="table table-bordered table-striped getTable">
                    <thead>
                        <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                            <th style="text-align: center">S/N</th>
                            <th style="text-align: center">Member</th>
                            <th style="text-align: center">Diet Plan</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($dietcharts as $value) {
                            ?>
                            <tr>
                                <td style="text-align: center"><?= $i ?></td>
                                <td style="text-align: center"><?= $value->member->fname ?> <?= $value->member->lname ?> (<?= $value->member->memberidno ?>)</td>
                                <td style="text-align:left;width: 60%;">
                                    <div class="box-group" id="accordion_<?= $i ?>">
                                        <div class="panel box box-primary">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">
                                                    <a style="color: #000;font-size:20px;font-weight: bold" data-toggle="collapse" data-parent="#accordion_<?= $i ?>" href="#division_<?= $i ?>">
                                                        <?= $value->dietplan->name ?>  <i class="fa fa-hand-o-down"></i>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="division_<?= $i ?>" class="panel-collapse collapse">
                                                <div class="box-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Early Morning</td>
                                                                    <td><?= $value->early_morning ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Breakfast</td>
                                                                    <td><?= $value->breakfast ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Mid Meal</td>
                                                                    <td><?= $value->mid_meal ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lunch</td>
                                                                    <td><?= $value->lunch ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Before workout</td>
                                                                    <td style="width:70%"><?= $value->before_workout ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>After Workout</td>
                                                                    <td><?= $value->after_workout ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Dinner</td>
                                                                    <td><?= $value->dinner ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Bed Time</td>
                                                                    <td><?= $value->bed_time ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td style="text-align: center">  
                                    <button class="btn btn-o btn-primary" onclick="window.location = '<?= URL::to('edit_diet_plan_chart/' . $value->id) ?>'" style="text-align: center;border-radius: 10px;" title="Edit"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-o btn-danger deletedata" id="<?= $value->id ?>" style="text-align: center;border-radius: 10px;" title="Delete"><i class="fa fa-trash-o"></i></button>
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
        $(document).on('click', '.deletedata', function () {
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
                    swal(window.location.href = "{{URL::to('delete_diet_plan_chart')}}" + '/' + id);
                } else {
                    swal("Cancelled");
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#diet_plan_chart').addClass('active');
    });
</script>
@endsection