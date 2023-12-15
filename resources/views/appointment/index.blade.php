@extends('layouts.app')
@section('title','Message Box')
@section('content')
<section class="content-header animated fadeInDown">
    <h1>Reply Messages </h1>
</section>
<section class="content">
    <div class="animated fadeInRight">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box-header with-border">
                            <h3 class="box-title">Get Message</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control inputnumber" value="<?= $appointment->name ?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control inputnumber" value="<?= $appointment->email ?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Contact</label>
                                <input type="text" class="form-control inputnumber" value="<?= $appointment->contact ?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Area</label>
                                <input type="text" class="form-control inputnumber" value="<?= $appointment->location ?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea rows="8" class="form-control inputnumber" style="text-align: justify" readonly=""><?= $appointment->message ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form action="{{route('feedbackmessage')}}" method="post" accept-charset="utf-8">
                            <?= csrf_field() ?>
                            <div class="box-header with-border">
                                <h3 class="box-title">Message Reply</h3>
                                <input type="hidden" name="nid" value="<?= $nid ?>">
                                <input type="hidden" name="dataid" value="<?= $appointment->id ?>">
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>To</label>
                                    <input type="email" class="form-control inputnumber" name="feedbackto" value="<?= $appointment->email ?>" readonly="">
                                </div>
                                <div class="form-group">
                                    <?php
                                    if ($appointment->status == 0) {
                                        ?>
                                        <label>Replied Message (<b><?= $appointment->replytime ?></b>)</label>
                                        <textarea rows="5" name="feedbackdata" class="form-control inputnumber" required=""><?= $appointment->mesreply ?></textarea>
                                    <?php } else { ?>
                                        <label>Feedback Message</label>
                                        <textarea rows="5" name="feedbackdata" class="form-control inputnumber" placeholder="Enter Message" required=""></textarea>
                                    <?php } ?>
                                </div>
                            </div>
                            <div style="text-align: center">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-reply"></i> Reply</button>
                            </div>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $("#allappointment").addClass('active');
    });
</script>
@endsection