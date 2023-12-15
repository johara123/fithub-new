@extends('layouts.app')
@section('title',$title)
@section('content')
<section class="content-header">
    <h1>{{$title}}</h1>
    <a class="btn btn-primary" href="{{URL::to('add_daily_workout')}}" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat"><i class="fa fa-plus" aria-hidden="true"></i> Add Daily Workout</a>
</section>
<section class="content animated fadeInRight">
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <form method="get" action="{{URL::to('member_weight_gain_loss')}}">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"><br>
                        <div class="form-group">
                            <select style="width: 100%" name="month" class="form-control getSelect" required="">
                                <option value="">Select Month</option>
                                @foreach($getmonths as $value)
                                <option value="{{$value->month}}-{{date('Y')}}">{{$value->month}}-{{date('Y')}}</option>
                                @endforeach
                            </select>
                        </div> 
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary" style="border-radius: 10px;margin-top:24px;"><i class="fa fa-search"></i> Search</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table  class="table table-bordered table-striped">
                            <thead>
                                <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                    <th style="text-align: center">Date</th>
                                    <th style="text-align: center">Day</th>
                                    <th style="text-align: center">Start Time</th>
                                    <th style="text-align: center">Start Weight(Kg)</th>
                                    <th style="text-align: center">End Time</th>
                                    <th style="text-align: center">End Weight(Kg)</th>
                                    <th style="text-align: center">Workout Times</th>
                                    <th style="text-align: center">Balance(Kg)</th>
                                    <th style="text-align: center">Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($getgainloss as $workouttimes) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?= $workouttimes->workout_date ?></td>
                                        <td style="text-align: center"><?= date('l', strtotime($workouttimes->workout_date)) ?></td>
                                        <td style="text-align: center"><?= $workouttimes->start_time ?></td>
                                        <td style="text-align: center"><?= $workouttimes->start_weight ?></td>
                                        <td style="text-align: center"><?= $workouttimes->end_time ?></td>
                                        <td style="text-align: center"><?= $workouttimes->end_weight ?></td>
                                        <td style="text-align: center"><?= $workouttimes->workout_time ?></td>
                                        <td style="text-align: center"><?= $workouttimes->workout_balance ?></td>
                                        <td style="text-align: center"><label class="label label-<?= $workouttimes->workout_result == 'Loss' ? 'success' : 'warning' ?>"> <?= $workouttimes->workout_result ?></label></td>
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
        </div>
    </div>
</section>
<script>
    function numberOnly(id) {
        // Only Number will write
        var element = document.getElementById(id);
        var regex = /[^0-9.]/gi;
        element.value = element.value.replace(regex, "");
    }

</script>
<script>
    $(document).ready(function () {
        $(document).on('change', 'select[name="profileinfo"]', function () {
            var values = $(this).val();
            var packageinfo = values.split('=');
            $("#set_profile").val(packageinfo[0]);
            $("#set_weight").val(packageinfo[1]);
            $("#set_initial_weight").val(packageinfo[1]);
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('keyup', '.getWorkoutweight', function () {
            var value = $(this).val();
            var initialw = Math.round($('.get_initial_weight').val());
            var workoutw = Math.round(value);
            if (value) {
                if (workoutw > initialw) {
                    var setresult = 'Gain';
                    var deference = workoutw - initialw;
                } else {
                    var setresult = 'Loss';
                    var deference = initialw - workoutw;
                }
                $("#set__deference").val(deference);
                $("#set__result").val(setresult);
            } else {
                $("#set__deference").val('');
                $("#set__result").val('');
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#weight_gain_loss').addClass('active');
    });
</script>
@endsection