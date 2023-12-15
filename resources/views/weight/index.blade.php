@extends('layouts.app')
@section('title',$title)
@section('content')
<section class="content-header">
    <h1>{{$datatitle}}</h1>
</section>
<section class="content animated fadeInRight">
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table data-page-length='100' class="table table-bordered table-striped getTable">
                            <thead>
                                <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">Date</th>
                                    <th style="text-align: center">Day</th>
                                    <th style="text-align: center">Member</th>
                                    <th style="text-align: center">Initial Weight(Kg)</th>
                                    <th style="text-align: center">Workout Weight(Kg)</th>
                                    <th style="text-align: center">Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($workouttimes as $value) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?= $i ?></td>
                                        <td style="text-align: center"><?= $value->workout_date ?></td>
                                        <td style="text-align: center"><?= date('l', strtotime($value->workout_date)) ?></td>
                                        <td style="text-align: center"><?= $value->profile->fname ?> <?= $value->profile->lname ?>(<?= $value->profile->memberidno ?>)</td>
                                        <td style="text-align: center"><?= $value->start_weight ?></td>
                                        <td style="text-align: center"><?= $value->end_weight ?></td>
                                        <td style="text-align: center"><?= $value->result ?></td>
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
    $(document).ready(function () {
        $('#weight_gain_loss').addClass('active');
    });
</script>
@endsection