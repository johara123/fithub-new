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
    <div class="box-group" id="accordion">
        <div class="panel" style="border: none">
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="box-body" style="border: 2px solid #3c8dbc">
                    <form method="post" action="{{route('saveupdate_package')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-3">
                                <input type="hidden" name="datafor" value="Saved">
                            </div>
                            <div class="col-md-6">
                                <label>Plan <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <select style="width: 100%" id="getplanid" name="plan_id" class="form-control getSelect" required="">
                                        <option value="">Select Plan</option>
                                        @foreach($getplandata as $value)
                                        <option value="{{$value->id}}">{{$value->name}} => {{$value->extra}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div>
                            <div class="col-md-3"></div>
                        </div><br>
                        <div class="row" style="display: none" id="showequipmentbox">
                            @foreach($getequipmentdata as $value)
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label style="">
                                        <input type="checkbox" name="equipment[]" value="{{$value->id}}" class="big"><span style="position: relative;left:10px;bottom: 10px">{{$value->name}}</span>
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div style="text-align: center">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-save"></i> Save</button>
                        </div>   
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <div class="table-responsive">
                <table data-page-length='100' class="table table-bordered table-striped getTable">
                    <thead>
                        <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                            <th style="text-align: center">S/N</th>
                            <th style="text-align: center">Plan</th>
                            <th style="text-align: center">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($getplandata as $value) {
                            $singledata = DB::table('packages')->leftJoin('singledata', 'packages.equipment_id', '=', 'singledata.id')->where('plan_id', $value->id)->get();
                            ?>
                            <tr>
                                <td style="text-align: center"><?= $i ?></td>
                                <td style="text-align: left">
                                    <b><?= $value->name ?></b><br>
                                    @foreach($singledata as $svalue)
                                    <div style="margin-left: 20px">=> <?= $svalue->name ?></div><br>
                                    @endforeach
                                </td>
                                <td style="text-align: center"><?= $value->extra ?> BDT</td>
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
        $(document).on('change', '#getplanid', function () {
            var value = $(this).val();
            if (value) {
                $("#showequipmentbox").show();
            } else {
                $("#showequipmentbox").hide();
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#gympackages').addClass('active');
    });
</script>
@endsection