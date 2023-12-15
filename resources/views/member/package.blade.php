@extends('layouts.app')
@section('title',$title)
@section('content')
<div id="postloader"></div>
<section class="content-header">
    <h1>{{$title}}</h1>
    <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-cubes" aria-hidden="true"></i> Change Package</a>
</section>
<section class="content animated fadeInRight">
    <div class="box-group" id="accordion">
        <div class="panel" style="border: none">
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="box-body" style="border: 2px solid #3c8dbc">
                    <form method="post" action="{{route('package_update_request')}}" name="getformdata">
                        {{csrf_field()}}
                        <div class="row"> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Package</label>
                                    <input type="hidden" name="old_package" value="{{@$profile->package}}">
                                    <input type="hidden" name="old_packageamt" value="{{@$profile->packageamt}}">
                                    <input type="text" name="" class="form-control inputnumber" value="{{@$profile->package}} => {{@$profile->packageamt}}" readonly="">
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <a href="{{URL::to('view_package_equipments')}}" class="btn btn-primary" style="border-radius: 10px;"><i class="fa fa-eye"></i> View Package's Equipments</a>
                            </div>
                        </div><br>
                        <div class="row"> 
                            <div class="col-md-4">
                                <input type="hidden" name="new_package" id="set_package">
                                <input type="hidden" name="new_packageamt" id="set_package_amt">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <lebel>Packages <span style="color:red">*</span></lebel>
                                    <select name="packageinfo" class="form-control inputnumber" required="">
                                        <option value="" disabled selected>Select Package</option>
                                        @foreach($getplandata as $value)
                                        @if($value->name != @$profile->package)
                                        <option value="{{$value->name}}={{$value->extra}}">{{$value->name}} => {{$value->extra}}</option>
                                        @endif
                                        @endforeach
                                    </select>                 
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div style="text-align: center">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-send-o"></i> Send</button>
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
                            <th style="text-align: center">New Package</th>
                            <th style="text-align: center">New Amount</th>
                            <th style="text-align: center">Old Package</th>
                            <th style="text-align: center">Old Amount</th>
                            <th style="text-align: center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($getpackagerecords as $value) {
                            ?>
                            <tr>
                                <td style="text-align: center"><?= $i ?></td>
                                <td style="text-align: center"><?= $value->newpackage ?></td>
                                <td style="text-align: center"><?= $value->newamount ?></td>
                                <td style="text-align: center"><?= $value->oldpackage ?></td>
                                <td style="text-align: center"><?= $value->oldamount ?></td>
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
        $('#gympackages').addClass('active');
    });
</script>
@endsection