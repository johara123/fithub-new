@extends('layouts.app')
@section('title',$title)
@section('content')
<section class="content-header animated fadeInDown">
    <h1>Day Wise Members Logs (Date: <?=date('Y-m-d')?>)</h1>
</section>
<section class="content animated fadeInRight">
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body"><br>
            <form action="{{URL::to('members_log_history')}}" method="get" accept-charset="utf-8">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="date" class="form-control inputnumber allDate" placeholder="Search Date Wise Log History" required="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary" style="border-radius: 10px;"><i class="fa fa-search"></i> Search</button>
                    </div>
                    <div class="col-md-2"></div>
                </div><br>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered getTable">
                            <thead>
                                <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">Name</th>
                                    <th style="text-align: center">ID No</th>
                                    <th style="text-align: center">In Time</th>
                                    <th style="text-align: center">Out Time</th>
                                    <th style="text-align: center">Login IP</th>
                                    <th style="text-align: center">Device</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($loghistory as $value) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?= $i ?></td>
                                        <td style="text-align: center"><?= @$value->profile->fname ?> <?= @$value->profile->lname ?></td>
                                        <td style="text-align: center"><?= @$value->profile->memberidno ?></td>
                                        <td style="text-align: center"><?= $value->timein ?></td>
                                        <td style="text-align: center"><?= $value->timeout ?></td>
                                        <td style="text-align: center"><?= $value->loginip ?></td>
                                        <td style="text-align: center"><?= $value->logindevice ?><br><?= $value->loginplatform ?><br><?= $value->loginbrowser ?></td>
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
        $("#members_log_history").addClass('active');
    });
</script>
@endsection