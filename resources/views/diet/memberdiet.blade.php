@extends('layouts.app')
@section('title',$title)
@section('content')
<section class="content-header">
    <h1>{{$title}}</h1>
</section>
<section class="content animated fadeInRight">
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                            <th style="text-align: center">S/N</th>
                            <th style="text-align: center">Member</th>
                            <th style="text-align: center">Diet Plan</th>
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
                                            <div id="division_<?= $i ?>" class="panel-collapse collapse in">
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
        $('#diet_plan_chart').addClass('active');
    });
</script>
@endsection