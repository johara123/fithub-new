@extends('layouts.app')
@section('title',$title)
@section('content')
<div id="postloader"></div>
<section class="content animated fadeInRight">
    <div class="row">
        <div class="col-md-12">
            <div class="panel" style="margin-top:-20px;">
                <div class="panel-content" style="border: 2px solid #3c8dbc;font-family: Montserrat" id="printarea">
                    <form method="post" action="{{route('approve_member_schedule')}}">
                        {{csrf_field()}}
                        <center>
                            <h4 style="font-family: Montserrat;font-weight: bold">{{$title}}</h4>
                        </center>
                        <input type="hidden" name="nid" value="<?= $nid ?>">
                        <input type="hidden" name="profile_id" value="<?= $fromid ?>">
                        <table class="table table-bordered" style="">
                            <tr>
                                <td><span style=""><b>Member ID</b> :</span></td>
                                <td><span style=""><?= $notification->memberidno ?></span></td>
                            </tr>
                            <tr>
                                <td><span style=""><b>Member</b> :</span></td>
                                <td><span style=""><?= $notification->fname ?> <?= $notification->lname ?></span></td>
                            </tr>
                        </table><br>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                    <th style="text-align: center">S/N</th>
                                    <th style="text-align: center">Day</th>
                                    <th style="text-align: center">Class</th>
                                    <th style="text-align: center">Trainer</th>
                                    <th style="text-align: center">Time</th>
                                    <th style="text-align: center">Check All</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $j = 1;
                                foreach ($memberschedule as $key => $value) {
                                    $result = $key + 1 == $j ? 'checked' : '';
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?= $j ?></td>
                                        <td style="text-align: center"><?= $value->day ?></td>
                                        <td style="text-align: center"><?= $value->class->name ?></td>
                                        <td style="text-align: center"><?= $value->trainer->name ?></td>
                                        <td style="text-align: center"><?= $value->time ?></td>
                                        <td style="text-align: center">
                                            <input type="checkbox" class="big" <?= $result ?> name="get_schedule_id[]" value="<?= $value->id ?>">
                                        </td>
                                    </tr>
                                    <?php
                                    $j++;
                                }
                                ?>
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-check-circle-o"></i> Approved</button>
                        </div>   
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection