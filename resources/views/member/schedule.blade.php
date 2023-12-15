@extends('layouts.app')
@section('title',$title)
@section('content')
<section class="content-header">
    <h1>{{$title}}</h1>
    <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add Class Schedule</a>
</section>
<?php

use App\Models\Memberschedule;

$result = count($getschedules);
?>
<section class="content animated fadeInRight">
    <div class="box-group" id="accordion">
        <div class="panel" style="border: none">
            <div id="collapseTwo" class="panel-collapse collapse <?= $result != 0 ? 'in' : '' ?>">
                <div class="box-body" style="border: 2px solid #3c8dbc">
                    <form method="get" action="{{URL::to('gymmemschedule')}}" name="getformdata">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <label>GYM Workout Days</label>
                                <div class="form-group">
                                    <select style="width:100%" name="day" onchange="this.form.submit()" class="form-control inputnumber getSelect" required="">
                                        <option value="" selected="" disabled="">Select Day</option>
                                        <?php foreach ($getweekdays as $days) { ?>
                                            <option value="<?= $days->day ?>"><?= $days->day ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>  
                    </form><br>
                    <form method="post" action="{{route('send_schedule_request')}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-12">
                                <h2><b><?= @$dayname ?></b></h2>
                                <input type="hidden" name="workoutday" value="<?= @$dayname ?>">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                                <th style="text-align: center">S/N</th>
                                                <th style="text-align: center">Class</th>
                                                <th style="text-align: center">Trainer</th>
                                                <th style="text-align: center">Time</th>
                                                <th style="text-align: center">Check</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $j = 1;
                                            foreach ($getschedules as $value) {
                                                $memberclass = Memberschedule::select('schedule_id')->where('profile_id', $profile_id)->where('schedule_id', $value->id)->first();
                                                ?>
                                                <tr>
                                                    <td style="text-align: center"><?= $j ?></td>
                                                    <td style="text-align: center"><?= $value->class->name ?></td>
                                                    <td style="text-align: center"><?= $value->trainer->name ?></td>
                                                    <td style="text-align: center"><?= $value->time ?></td>
                                                    <td style="text-align: center">
                                                        <input type="checkbox" class="big getcheckboxvalue" name="classschedules[]" <?= @$memberclass->schedule_id == $value->id ? 'checked disabled' : ' ' ?> value="<?= $value->id ?>">
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
                        @if(@$dayname)
                        <div style="text-align: center;" id="hideSavebtn">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-send-o"></i> Set Request</button>
                        </div>  
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            @foreach($getdays as $dayavalue)
            <div class="row">
                <div class="col-md-12">
                    <h2><b><?= $dayavalue->day ?></b></h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">Class</th>
                                    <th style="text-align: center">Trainer</th>
                                    <th style="text-align: center">Time</th>
                                    <th style="text-align: center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $memberschedule = Memberschedule::with('class', 'trainer')->where('profile_id', $profile_id)->where('day', $dayavalue->day)->get();
                                foreach ($memberschedule as $value) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?= $i ?></td>
                                        <td style="text-align: center"><?= $value->class->name ?></td>
                                        <td style="text-align: center"><?= $value->trainer->name ?></td>
                                        <td style="text-align: center"><?= $value->time ?></td>
                                        <?php if ($value->appstatus == 1) { ?>
                                            <td style="text-align: center"><span style="border-radius:10px;background: green;color: #fff;padding: 5px">Approved</span></td>
                                        <?php } else { ?>
                                            <td style="text-align: center"><span class="blink" style="border-radius:10px;background:orange;color: #fff;padding: 5px">Pending</span></td>
                                        <?php } ?> 
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
            @endforeach
        </div>
    </div>
</section>
<script>
    document.forms['getformdata'].elements['day'].value = '<?= @$dayname ?>';
</script>
<script>
    $(document).ready(function () {
        let count = 0;
        $.each($(".getcheckboxvalue:checked"), function () {
            count = count + 1;
        });
        if (count === 6) {
            $("#hideSavebtn").hide();
        }
    });
</script>
<script>
    $(document).ready(function () {
        $("#checkBoxall").click(function () {
            $(".getcheckboxvalue").prop('checked', $(this).prop('checked'));
        });
    });
    $(document).ready(function () {
        $('#gymmemschedule').addClass('active');
    });
</script>
@endsection