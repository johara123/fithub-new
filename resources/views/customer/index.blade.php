@extends('layouts.app')
@section('title',$title)
@section('content')
<section class="content-header">
    <h1>{{$title}}</h1>
</section>
<?php

use App\Models\Schedule;
?>
<section class="content animated fadeInRight">
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <div class="table-responsive">
                <table data-page-length='100' class="table table-bordered table-striped getTable">
                    <thead>
                        <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                            <th style="text-align: center">S/N</th>
                            <th style="text-align: center">Date</th>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">Package</th>
                            <th style="text-align: center">Amount</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $k = 1;
                        foreach ($customerlist as $value) {
                            ?>
                            <tr>
                                <td style="text-align: center"><?= $k ?></td>
                                <td style="text-align: center"><?= date('Y-m-d', strtotime($value->created_at)) ?></td>
                                <td style="text-align: center"><?= $value->memberidno ?></td>
                                <td style="text-align: center"><?= $value->fname ?> <?= $value->lname ?></td>
                                <td style="text-align: center"><?= $value->package ?></td>
                                <td style="text-align: center"><?= $value->packageamt ?></td>
                                @if ($value->profilestatus === 0)
                                <td style="text-align: center"><span style="border-radius:10px;background:orange;color: #fff;padding: 5px">Pending</span></td>
                                @elseif ($value->profilestatus === 2)
                                <td style="text-align: center"><span style="border-radius:10px;background:orange;color: #fff;padding: 5px">Canceled</span></td>
                                @elseif ($value->exmember === 1)
                                <td style="text-align: center"><span style="border-radius:10px;background:orange;color: #fff;padding: 5px">Formar Member</span></td>
                                @else
                                <td style="text-align: center"><span style="border-radius:10px;background: green;color: #fff;padding: 5px">Active</span></td>
                                @endif
                                <td style="text-align: center">
                                    <button class="btn btn-o btn-primary" onclick="window.location = '<?= URL::to('view_membership_details?id=' . $value->id) ?>'" style="text-align: center;border-radius: 10px;" title="View"><i class="fa fa-cubes"></i></button>
                                </td>
                            </tr>
                            <?php
                            $k++;
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
        $(document).on('change', '#getMembers', function () {
            var value = $(this).val();
            if (value) {
                $("#showeschedulebox").show();
            } else {
                $("#showeschedulebox").hide();
            }
        });
    });
</script>
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