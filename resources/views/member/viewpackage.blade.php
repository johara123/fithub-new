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
                <table data-page-length='100' class="table table-bordered table-striped getTable">
                    <thead>
                        <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                            <th style="text-align: center">S/N</th>
                            <th style="text-align: center">Package</th>
                            <th style="text-align: center">Amount</th>
                            <th style="text-align: center">Equipments</th>
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
                                <td style="text-align: center"><?= $value->name ?></td>
                                <td style="text-align: center"><?= $value->extra ?></td>
                                <td style="text-align: left">
                                    <ul>
                                        @foreach($singledata as $svalue)
                                        <li style="list-style: none">
                                            <p><i class="fa fa-hand-o-right"></i> {{$svalue->name}}</p>
                                        </li>
                                        @endforeach
                                    </ul>
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
        $('#gympackages').addClass('active');
    });
</script>
@endsection