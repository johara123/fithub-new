@extends('layouts.app')
@section('title',$title)
@section('content')
<div id="postloader"></div>
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
                            <th style="text-align: center">Amount</th>
                            <th style="text-align: center">Paid</th>
                            <th style="text-align: center">Due</th>
                            <th style="text-align: center">Paid Month</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($gympaymentstatus as $value) {
                            ?>
                            <tr>
                                <td style="text-align: center"><?= $i ?></td>
                                <td style="text-align: center"><?= $value->amount ?></td>
                                <td style="text-align: center"><?= $value->paid ?></td>
                                <td style="text-align: center"><?= $value->due ?></td>
                                <td style="text-align: center"><?= $value->paidmonth ?></td>
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
        $('#gympaymentstatus').addClass('active');
    });
</script>
@endsection