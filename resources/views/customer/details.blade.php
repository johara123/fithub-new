@extends('layouts.app')
@section('title',$title)
@section('content')
<?php

use App\Models\Memberschedule;
use App\Models\Trainer;
?>
<section class="content-header">
    <h1>{{$title}}</h1>
</section>
<section class="content animated fadeInRight">
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Info</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Classes</a></li>
                            <li><a href="#tab_3" data-toggle="tab">Trainers</a></li>
                            <li><a href="#tab_4" data-toggle="tab">Packages</a></li>
                            <li><a href="#tab_44" data-toggle="tab">Payments</a></li>
                            <li><a href="#tab_5" data-toggle="tab">Formar Member</a></li>
                            <li><a href="#tab_6" data-toggle="tab">Permanent Delete Profile</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <table class="table table-bordered" style="">
                                    <tr>
                                        <td><span style=""><b>Membership ID</b> :</span></td>
                                        <td><span style=""><?= $memberinfo->memberidno ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style=""><b>Name</b> :</span></td>
                                        <td><span style=""><?= $memberinfo->fname ?> <?= $memberinfo->lname ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style=""><b>Gender</b> :</span></td>
                                        <td><span style=""><?= $memberinfo->gender ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style=""><b>Email Address</b> :</span></td>
                                        <td><span style=""><?= $memberinfo->email ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style=""><b>Contact Number</b> :</span></td>
                                        <td><span style=""><?= $memberinfo->contact ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style=""><b>Occupation</b> :</span></td>
                                        <td><span style=""><?= $memberinfo->occupation ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style=""><b>Weight</b> :</span></td>
                                        <td><span style=""><?= $memberinfo->weight ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style=""><b>Reason</b> :</span></td>
                                        <td><span style=""><?= $memberinfo->reason ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style=""><b>Package</b> :</span></td>
                                        <td><span style=""><?= $memberinfo->package ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style=""><b>Package Amount</b> :</span></td>
                                        <td><span style=""><?= $memberinfo->packageamt ?> BDT</span></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane" id="tab_2">
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
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    $memberschedule = Memberschedule::with('class', 'trainer')->where('profile_id', $memberinfo->id)->where('day', $dayavalue->day)->orderBy('schedule_id', 'asc')->get();
                                                    foreach ($memberschedule as $value) {
                                                        ?>
                                                        <tr>
                                                            <td style="text-align: center"><?= $i ?></td>
                                                            <td style="text-align: center"><?= $value->class->name ?></td>
                                                            <td style="text-align: center"><?= $value->trainer->name ?></td>
                                                            <td style="text-align: center"><?= $value->time ?></td>
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
                            <div class="tab-pane" id="tab_3">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                                <th style="text-align: center">S/N</th>
                                                <th style="text-align: center">Name</th>
                                                <th style="text-align: center">Post</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $j = 1;
                                            foreach ($gettrainers as $value) {
                                                $trainer = Trainer::select('name', 'post')->where('id', $value->trainer_id)->first();
                                                ?>
                                                <tr>
                                                    <td style="text-align: center"><?= $j ?></td>
                                                    <td style="text-align: center"><?= $trainer->name ?></td>
                                                    <td style="text-align: center"><?= $trainer->post ?></td>
                                                </tr>
                                                <?php
                                                $j++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_4">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped getTable">
                                        <thead>
                                            <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                                <th style="text-align: center">S/N</th>
                                                <th style="text-align: center">New Package</th>
                                                <th style="text-align: center">New Amount</th>
                                                <th style="text-align: center">Old Package</th>
                                                <th style="text-align: center">Old Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $k = 1;
                                            foreach ($getpackagerecords as $value) {
                                                ?>
                                                <tr>
                                                    <td style="text-align: center"><?= $k ?></td>
                                                    <td style="text-align: center"><?= $value->newpackage ?></td>
                                                    <td style="text-align: center"><?= $value->newamount ?></td>
                                                    <td style="text-align: center"><?= $value->oldpackage ?></td>
                                                    <td style="text-align: center"><?= $value->oldamount ?></td>
                                                </tr>
                                                <?php
                                                $k++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_44">
                                <div class="table-responsive">
                                    <table data-page-length='100' class="table table-bordered table-striped getTable">
                                        <thead>
                                            <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                                                <th style="text-align: center">S/N</th>
                                                <th style="text-align: center">Amount</th>
                                                <th style="text-align: center">Paid</th>
                                                <th style="text-align: center">Due</th>
                                                <th style="text-align: center">Paid Method</th>
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
                                                    <td style="text-align: center"><?= $value->ptype ?></td>
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
                            <div class="tab-pane" id="tab_5">
                                <center>
                                    @if ($memberinfo->exmember ===0)
                                    <a onclick="return confirm('Are you sure ?')" href="<?= URL::to('exgymmemberstatus?id=' . $memberinfo->id) ?>" class="btn" style="background: purple;color: #fff;text-align: center;border-radius: 10px;"><i class="fa fa-cubes"></i> Profile Status Make Formar Member ?</a>
                                    @elseif ($memberinfo->exmember ===1)
                                    <a onclick="return confirm('Are you sure ?')" href="<?= URL::to('reapprovedmember?id=' . $memberinfo->id) ?>" class="btn" style="background: purple;color: #fff;text-align: center;border-radius: 10px;"><i class="fa fa-check-circle"> Profile Status Re Approved From Formar Member ?</i></a>
                                    @endif
                                </center>
                            </div>
                            <div class="tab-pane" id="tab_6">
                                <center>
                                    <button class="btn btn-o btn-danger deletemember" id="<?= $memberinfo->id ?>" style="text-align: center;border-radius: 10px;" title="Delete"><i class="fa fa-trash-o"></i> Profile Access Delete ?</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $(document).on('click', '.deletemember', function () {
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
                    swal(window.location.href = "{{URL::to('delete_member_access')}}" + '/' + id);
                } else {
                    swal("Cancelled");
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#customerlist').addClass('active');
    });
</script>
@endsection