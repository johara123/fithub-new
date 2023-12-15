@extends('layouts.app')
@section('title',$title)
@section('content')
<?php

use App\Models\Package;
?>
<section class="content-header">
    <h1>Manage {{$title}}</h1>
    <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
</section>
<section class="content animated fadeInRight">
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <div class="table-responsive">
                <table data-page-length='100' class="table table-bordered table-striped getTable">
                    <thead>
                        <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                            <th style="text-align: center">S/N</th>
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">Contact</th>
                            <th style="text-align: center">Email</th>
                            <th style="text-align: center">Area</th>
                            <th style="text-align: center">Message</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($appointments as $value) {
                            ?>
                            <tr>
                                <td style="text-align: center"><?= $i ?></td>
                                <td style="text-align: left"><?= $value->name ?></td>
                                <td style="text-align: left"><?= $value->contact ?></td>
                                <td style="text-align: left"><?= $value->email ?></td>
                                <td style="text-align: left"><?= $value->location ?></td>
                                <td style="text-align: left"><?= $value->message ?></td>
                                <td style="text-align: center">
                                    <a class="btn btn-primary" href="{{URL::to('view_new_appointment_info?nid=&from='.$value->id)}}" style="border-radius: 10px;"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
        $('#allappointment').addClass('active');
    });
</script>
@endsection