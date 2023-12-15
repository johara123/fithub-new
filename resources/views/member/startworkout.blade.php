@extends('layouts.app')
@section('title','Start Daily Workout')
@section('content')
<section class="content-header animated fadeInDown">
    <h1>Start Daily Workout</h1>
    <a class="btn" href="<?= URL::to('member') ?>" style="border-radius:10px;float:right;margin-top:-28px;margin-left: 10px;background:#000;color: #fff"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
</section>
<section class="content animated fadeInRight">
    <div class="box tableborder">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('save_daily_workout') }}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-4">
                                <label>Start Time<span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="hidden" name="workout_status" value="<?= $workout_status ?>">
                                    <input type="text" name="start_time" class="form-control inputnumber" value="<?= date('g:i A') ?>" readonly="">
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <label>Initial Weight while Starting (Kg) <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" oninput="numbertextOnly(this.id);" id="start_weight" name="start_weight" class="form-control inputnumber" placeholder="Enter Start Weight" required="">
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;margin-top: 28px;"><i class="fa fa-check"></i> Start</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function numbertextOnly(id) {
        // Only Number will write
        var element = document.getElementById(id);
        var regex = /[^0-9.]/gi;
        element.value = element.value.replace(regex, "");
    }
    $(document).ready(function () {
        $("#dashboard").addClass('active');
    });
</script>
@endsection