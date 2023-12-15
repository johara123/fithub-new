@extends('layouts.app')
@section('title',$title)
@section('content')
<section class="content-header animated fadeInDown">
    <h1><?= $title ?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body no-padding">
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <tbody>
                                <tr>
                                    <td class="mailbox-name">1#</td>
                                    <td class="mailbox-name"><a href="#">Alexander Pierce</a></td>
                                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                                    </td>
                                    <td class="mailbox-attachment"></td>
                                    <td class="mailbox-date">5 mins ago</td>
                                    <td>
                                        <span class="label label-warning">Pending</span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></button>
                                        </div>
                                    </td>
                                </tr>

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
        $('#getmssagebox').addClass('active');
    });
</script>
@endsection