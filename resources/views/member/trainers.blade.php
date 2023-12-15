@extends('layouts.app')
@section('title',$title)
@section('content')
<div id="postloader"></div>
<section class="content-header">
    <h1>{{$title}}</h1>
    <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-cubes" aria-hidden="true"></i> Change Trainer</a>
</section>
<section class="content animated fadeInRight">
    <div class="box-group" id="accordion">
        <div class="panel" style="border: none">
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="box-body" style="border: 2px solid #3c8dbc">
                    <form method="post" action="{{route('trainer_update_request')}}" name="getformdata">
                        {{csrf_field()}}
                        <div class="row"> 
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Old Trainer</label>
                                    <input type="text" name="old_trainer" class="form-control inputnumber" value="{{@$profile->trainer}}" readonly="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <lebel>Trainers <span style="color:red">*</span></lebel>
                                    <select name="new_trainer" class="form-control inputnumber" required="">
                                        <option value="" disabled selected>Select Trainer</option>
                                        @foreach($gymtraniners as $value)
                                        @if($value->name != @$profile->trainer)
                                        <option value="{{$value->name}}">{{$value->name}} => {{$value->post}}</option>
                                        @endif
                                        @endforeach
                                    </select>                 
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Remarks <span style="color:red">*</span></label>
                                    <textarea rows="5" name="remarks" class="form-control inputnumber" required=""></textarea>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div><br>
                        <center>
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px"><i class="fa fa-send-o"></i> Send</button>
                        </center>
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
                            <th style="text-align: center">Old</th>
                            <th style="text-align: center">New</th>
                            <th style="text-align: center">Remarks</th>
                            <th style="text-align: center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($gettrainerrecord as $value) {
                            ?>
                            <tr>
                                <td style="text-align: center"><?= $i ?></td>
                                <td style="text-align: center"><?= $value->old_trainer ?></td>
                                <td style="text-align: center"><?= $value->new_trainer ?></td>
                                <td style="text-align: center"><?= $value->remarks ?></td>
                                <?php if ($value->status == 1) { ?>
                                    <td style="text-align: center"><span style="border-radius:10px;background: green;color: #fff;padding: 5px">Approved</span></td>
                                <?php } else { ?>
                                    <td style="text-align: center"><span class="blink" style="border-radius:10px;background:orange;color: #fff;padding: 5px">Pending</span></td>
                                <?php } ?> 
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
        $(document).on('change', 'select[name="packageinfo"]', function () {
            var values = $(this).val();
            var packageinfo = values.split('=');
            $("#set_package").val(packageinfo[0]);
            $("#set_package_amt").val(packageinfo[1]);
        });
    });
</script>
<script>
</script>
<script>
    $(document).ready(function () {
        $('#gymtrainers').addClass('active');
    });
</script>
@endsection