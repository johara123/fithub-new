@extends('layouts.app')
@section('title',$title)
@section('content')
<section class="content-header">
    <h1>{{$title}}</h1>
</section>
<section class="content animated fadeInRight">
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <form method="post" action="{{route('update_member_trainer')}}">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-4">
                        <input type="hidden" name="nid" value="<?= $nid ?>">
                        <input type="hidden" name="upd_id" value="<?= $trainerrecord->id ?>">
                        <input type="hidden" name="cp_id" value="<?= $trainerrecord->profile->id ?>">
                        <label>Requested By <span style="color: red">*</span></label>
                        <div class="form-group">
                            <input type="text" class="form-control inputnumber" value="<?= $trainerrecord->profile->fname ?> <?= $trainerrecord->profile->lname ?>" readonly="">
                        </div> 
                    </div>
                    <div class="col-md-4">
                        <label>Old Trainer <span style="color: red">*</span></label>
                        <div class="form-group">
                            <input type="text" name="old_trainer" class="form-control inputnumber" value="<?= $trainerrecord->old_trainer ?>" readonly="">
                        </div> 
                    </div>
                    <div class="col-md-4">
                        <label>New Trainer <span style="color: red">*</span></label>
                        <div class="form-group">
                            <input type="text" name="new_trainer" class="form-control inputnumber" value="<?= $trainerrecord->new_trainer ?>" readonly="">
                        </div> 
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <label>Remarks <span style="color: red">*</span></label>
                        <div class="form-group">
                            <textarea rows="5" class="form-control inputnumber"><?= $trainerrecord->remarks ?></textarea>
                        </div> 
                    </div>
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
        $('#gymtraniners').addClass('active');
    });
</script>
@endsection