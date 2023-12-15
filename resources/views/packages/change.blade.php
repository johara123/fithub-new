@extends('layouts.app')
@section('title',$title)
@section('content')
<section class="content-header">
    <h1>{{$title}}</h1>
</section>
<section class="content animated fadeInRight">
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <form method="post" action="{{route('update_member_package')}}">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-3">
                        <input type="hidden" name="nid" value="<?= $nid ?>">
                        <input type="hidden" name="upd_id" value="<?= $packagerecord->id ?>">
                        <input type="hidden" name="cp_id" value="<?= $packagerecord->profile->id ?>">
                        <input type="hidden" name="newpackage" value="<?= $packagerecord->newpackage ?>">
                        <input type="hidden" name="newamount" value="<?= $packagerecord->newamount ?>">
                    </div>
                    <div class="col-md-3">
                        <label>Requested By <span style="color: red">*</span></label>
                        <div class="form-group">
                            <input type="text" class="form-control inputnumber" value="<?= $packagerecord->profile->fname ?> <?= $packagerecord->profile->lname ?>" readonly="">
                        </div> 
                    </div>
                    <div class="col-md-3">
                        <label>Old Package <span style="color: red">*</span></label>
                        <div class="form-group">
                            <input type="text" class="form-control inputnumber" value="<?= $packagerecord->oldpackage ?> => <?= $packagerecord->oldamount ?>" readonly="">
                        </div> 
                    </div>
                    <div class="col-md-3"></div>
                </div><br>
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">
                        <label>New Package <span style="color: red">*</span></label>
                        <div class="form-group">
                            <input type="text" class="form-control inputnumber" value="<?= $packagerecord->newpackage ?> => <?= $packagerecord->newamount ?>" readonly="">
                        </div> 
                    </div>
                    <div class="col-md-3"></div>
                </div><br>
                <div style="text-align: center">
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-check-circle-o"></i> Approved</button>
                </div>   
            </form>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $('#gympackages').addClass('active');
    });
</script>
@endsection