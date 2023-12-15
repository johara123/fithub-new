@extends('layouts.app')
@section('title','Add Missing Workout')
@section('content')
<section class="content-header animated fadeInDown">
    <h1>Add Missing Workout</h1>
    <a class="btn" href="<?= URL::to('member_weight_gain_loss') ?>" style="border-radius:10px;float:right;margin-top:-28px;margin-left: 10px;background:#000;color: #fff"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
</section>
<section class="content animated fadeInRight">
    <div class="box tableborder">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('update_missing_workout') }}">
                        {{csrf_field()}}
                        <div class="row form-group">
                            <div class="col-md-2"></div>
                            <label class="col-md-3"><i class="fa fa-hand-o-right"></i> Started Date <span style="color: red">*</span></label>
                            <div class="col-md-3">
                                <input type="text" name="workout_date" class="form-control inputnumber allDate" placeholder="Select Started Date" required="">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2"></div>
                            <label class="col-md-3"><i class="fa fa-hand-o-right"></i> Started Time <span style="color: red">*</span></label>
                            <div class="col-md-3">
                                <input type="text" name="start_time" class="form-control inputnumber timepicker" value="08:00 AM" required="">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2"></div>
                            <label class="col-md-3"><i class="fa fa-hand-o-right"></i> Started Weight(Kg) <span style="color: red">*</span></label>
                            <div class="col-md-3">
                                <input type="text" name="start_weight" oninput="numberOnly(this.id);" id="start_weight" class="form-control inputnumber" placeholder="Enter Started Weight" required="">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2"></div>
                            <label class="col-md-3"><i class="fa fa-hand-o-right"></i> End Time <span style="color: red">*</span></label>
                            <div class="col-md-3">
                                <input type="text" name="end_time" class="form-control inputnumber timepicker" value="08:00 PM" required="">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2"></div>
                            <label class="col-md-3"><i class="fa fa-hand-o-right"></i> End Weight(Kg) <span style="color: red">*</span></label>
                            <div class="col-md-3">
                                <input type="text" name="end_weight" oninput="numberOnly(this.id);" id="end_time" class="form-control inputnumber" placeholder="Enter End Weight" required="">
                            </div>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;margin-top: 28px;"><i class="fa fa-save"></i> Save</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function numberOnly(id) {
        // Only Number will write
        var element = document.getElementById(id);
        var regex = /[^0-9.]/gi;
        element.value = element.value.replace(regex, "");
    }
    $(document).ready(function () {
        $('#weight_gain_loss').addClass('active');
    });
</script>
@endsection