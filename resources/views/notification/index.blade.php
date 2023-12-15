@extends('layouts.app')
@section('title','View All Notifications')
@section('content')
<section class="content-header">
    <h1>View All Notifications</h1>
</section>
<section class="content animated fadeInRight">
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <div class="table-responsive">
                <table data-page-length='100' class="table table-bordered table-striped getTable">
                    <thead>
                        <tr style="background:#3c8dbc;color:#fff;font-weight:bold;text-transform: uppercase;">
                            <th style="text-align: center">S/N</th>
                            <th style="text-align: center">Date & Time</th>
                            <th style="text-align: center">Requested By</th>
                            <th style="text-align: center">Requested For</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($notification as $value) {
                            ?>
                            <tr>
                                <td style="text-align: center"><?= $i ?></td>
                                <td style="text-align: center"><?= date('Y-m-d, g:i A', strtotime($value->created_at)) ?></td>
                                <td style="text-align: center"><?= $value->name ?></td>
                                <td style="text-align: center"><?= $value->reason ?></td>
                                <td style="text-align: center">
                                    <button class="btn btn-o btn-warning blink" onclick="window.location = '<?= URL::to($value->route . '?nid=' . $value->id . '&for=' . $value->for . '&from=' . $value->from) ?>'" style="text-align: center;border-radius: 10px;" title="View"><i class="fa fa-eye"></i></button>
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
@endsection