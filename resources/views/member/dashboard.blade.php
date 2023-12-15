@extends('layouts.app')
@section('title','User Dashboard')
@section('content')
<section class="content-header animated fadeInDown">
    <h1>User Dashboard</h1>
    @if(@$profile_workout->workout_status==0)
    <a class="btn blink" href="{{URL::to('add_start_daily_workout')}}" style="background: purple;border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Start Daily Workout</a>
    @elseif(@$profile_workout->workout_status==1)
    <a class="btn blink" href="{{URL::to('close_start_daily_workout')}}" style="background:orange;border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-times" aria-hidden="true"></i> End Daily Workout</a>
    @else
    <a class="btn" href="#" style="background:green;border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-times" aria-hidden="true"></i> Today's Workout Done</a>
    @endif
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-4 col-xs-6 animated fadeInDown">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><?= $totalgymclass ?></h3>
                    <h4 style="font-size: 25px;">Total Class</h4>
                </div>
                <div class="icon">
                    <i class="fa fa-university"></i>
                </div>
                <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
        </div>
        <div class="col-lg-4 col-xs-6 animated fadeInDown">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><?= $totalgym ?></h3>
                    <h4 style="font-size: 25px;">Workout</h4>
                </div>
                <div class="icon">
                    <i class="fa fa-user-plus"></i>
                </div>
                <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
        </div>
        <div class="col-lg-4 col-xs-6 animated fadeInDown">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>0</h3>
                    <h4 style="font-size: 25px;">No Workout</h4>
                </div>
                <div class="icon">
                    <i class="fa fa-user-times"></i>
                </div>
                <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-lg-12 col-xs-12 animated fadeInDown">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Day Wise Workout Status</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                    <th style="text-align: center">Day</th>
                                    <th style="text-align: center">Start Time</th>
                                    <th style="text-align: center">Start Weight(Kg)</th>
                                    <th style="text-align: center">End Time</th>
                                    <th style="text-align: center">End Weight(Kg)</th>
                                    <th style="text-align: center">Workout Times</th>
                                    <th style="text-align: center">Workout Weight(Kg)</th>
                                    <th style="text-align: center">Workout Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($workouttimes as $value) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?php if (!empty(@$value->workout_date)) { ?><?= date('l', strtotime(@$value->workout_date)) ?><?php } ?></td>
                                        <td style="text-align: center"><?= @$value->start_time ?></td>
                                        <td style="text-align: center"><?= @$value->start_weight ?></td>
                                        <td style="text-align: center"><?= @$value->end_time ?></td>
                                        <td style="text-align: center"><?= @$value->end_weight ?></td>
                                        <td style="text-align: center"><?= @$value->workout_time ?></td>
                                        <td style="text-align: center"><?= @$value->workout_balance ?></td>
                                        <td style="text-align: center"><?= @$value->workout_result ?></td>
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
    <!--    <div class="row">
            <div class="col-lg-12 col-xs-12 animated fadeInDown">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Day Wise Weight Gain or Loss Table</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                        <th style="text-align: center">S/N</th>
                                        <th style="text-align: center">Day</th>
                                        <th style="text-align: center">Date</th>
                                        <th style="text-align: center">Initial Weight</th>
                                        <th style="text-align: center">Workout Weight</th>
                                        <th style="text-align: center">Result</th>
                                        <th style="text-align: center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
    <?php
    $i = 1;
    foreach ($getgainloss as $value) {
        ?>
                                                <tr>
                                                    <td style="text-align: center"><?= $i ?></td>
                                                    <td style="text-align: center"><?= date('l', strtotime($value->report_date)) ?></td>
                                                    <td style="text-align: center"><?= $value->report_date ?></td>
                                                    <td style="text-align: center"><?= $value->initial_weight ?> Kg</td>
                                                    <td style="text-align: center"><?= $value->wrokout_weight ?> Kg</td>
                                                    <td style="text-align: center"><?= $value->gym_result ?> Kg</td>
                                                    <td style="text-align: center"><label class="label label-<?= $value->gym_status == 'Loss' ? 'success' : 'warning' ?>"> <?= $value->gym_status ?></label></td>
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
        </div>-->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Weekly Weight Gain (<i class="fa fa-arrow-up"></i>) or Loss (<i class="fa fa-arrow-down"></i>) Graph</h3><br><br>
                </div>
            </div>
        </div>
    </div>
    <div class="chart">
        <canvas id="salesChart" style="height: 180px;"></canvas>
    </div>
</section>
<script src="{{asset('/')}}backend/js/chart.js"></script>
<script>
$(function () {
    var start_weight = '<?= $start_weight ?>';
    var startweight = start_weight.split(',');
    var end_weight = '<?= $end_weight ?>';
    var endweight = end_weight.split(',');

    var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
    var salesChart = new Chart(salesChartCanvas);
    var salesChartData = {
        labels: ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
        datasets: [{
                label: 'Start',
                fillColor: 'rgb(255, 165, 0)',
                strokeColor: 'rgb(255, 165, 0)',
                pointColor: 'rgb(255, 165, 0)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgb(255, 165, 0)',
                data: startweight
            }, {
                label: 'End',
                fillColor: 'rgba(60,141,188,0.9)',
                strokeColor: 'rgba(60,141,188,0.8)',
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: endweight
            }]
    };

    var salesChartOptions = {
        showScale: true,
        scaleShowGridLines: false,
        scaleGridLineColor: 'rgba(0,0,0,.05)',
        scaleGridLineWidth: 1,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines: true,
        bezierCurve: true,
        bezierCurveTension: 0.3,
        pointDot: false,
        pointDotRadius: 4,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
        maintainAspectRatio: true,
        responsive: true
    };
    salesChart.Line(salesChartData, salesChartOptions);
});
$(document).ready(function () {
    $('#dashboard').addClass('active');
});
</script>
@endsection