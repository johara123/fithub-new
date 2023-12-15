@extends('layouts.app')
@section('title','View Customer Registration Info')
@section('content')
<section class="content-header">
    <h1>View Customer Registration Info</h1>
</section><br>
<section class="content animated fadeInRight">
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <div id="approvedBox">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{route('addtocustomerlist')}}">
                            {{csrf_field()}}
                            <center>
                                <h4 style="font-family: Montserrat;font-weight: bold">New Customer Registration Info</h4>
                            </center>
                            <input type="hidden" name="nid" value="<?= $nid ?>">
                            <input type="hidden" name="profile_id" value="<?= $fromid ?>">
                            <input type="hidden" name="packageamt" value="<?= $notification->packageamt ?>">
                            <input type="hidden" name="paymethod" value="<?= $notification->paymethod ?>">
                            <table class="table table-bordered" style="">
                                <tr>
                                    <td><span style=""><b>Customer</b> :</span></td>
                                    <td><span style=""><?= $notification->fname ?> <?= $notification->lname ?></span></td>
                                </tr>
                                <tr>
                                    <td><span style=""><b>Gender</b> :</span></td>
                                    <td><span style=""><?= $notification->gender ?></span></td>
                                </tr>
                                <tr>
                                    <td><span style=""><b>Email Address</b> :</span></td>
                                    <td><span style=""><?= $notification->email ?></span></td>
                                </tr>
                                <tr>
                                    <td><span style=""><b>Contact Number</b> :</span></td>
                                    <td><span style=""><?= $notification->contact ?></span></td>
                                </tr>
                                <tr>
                                    <td><span style=""><b>Occupation</b> :</span></td>
                                    <td><span style=""><?= $notification->occupation ?></span></td>
                                </tr>
                                <tr>
                                    <td><span style=""><b>Height</b> :</span></td>
                                    <td><span style=""><?= $notification->height ?></span></td>
                                </tr>
                                <tr>
                                    <td><span style=""><b>Weight</b> :</span></td>
                                    <td><span style=""><?= $notification->weight ?> Kg</span></td>
                                </tr>
                                <tr>
                                    <td><span style=""><b>Reason</b> :</span></td>
                                    <td><span style=""><?= $notification->reason ?></span></td>
                                </tr>
                                <tr>
                                    <td><span style=""><b>Package</b> :</span></td>
                                    <td><span style=""><?= $notification->package ?></span></td>
                                </tr>
                                <tr>
                                    <td><span style=""><b>Package Amount</b> :</span></td>
                                    <td><span style=""><?= $notification->packageamt ?></span></td>
                                </tr>
                                <tr>
                                    <td><span style=""><b>Payment Method</b> :</span></td>
                                    <td><span style=""><?= $notification->paymethod ?></span></td>
                                </tr>
                                <tr>
                                    <td><span style=""><b>Transaction ID NO.</b> :</span></td>
                                    <td><span style=""><?= @$transactionid->transaction_id ?></span></td>
                                </tr>
                            </table><br>
                            <div style="text-align: center">
                                <button type="submit" id="hideSavebtn" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-check-circle-o"></i> Approved</button>
                                <button type="button" id="cancelRequest" value="cancel" class="btn btn-warning" style="border-radius: 10px;"><i class="fa fa-times"></i> Cancel</button>
                            </div>   
                        </form> 
                    </div>
                </div>
            </div><br>
            <div style="display: none" id="showCancelBox">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{route('cancelcustomerlist')}}">
                            {{csrf_field()}}
                            <center>
                                <h4 style="font-family: Montserrat;font-weight: bold">Cancel Customer Registration Info</h4>
                            </center>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="nid" value="<?= $nid ?>">
                                    <input type="hidden" name="profile_id" value="<?= $fromid ?>">
                                    <input type="hidden" name="packageamt" value="<?= $notification->packageamt ?>">
                                    <input type="hidden" name="paymethod" value="<?= $notification->paymethod ?>">
                                    <div class="form-group">
                                        <label>Cancel Remark <span style="color: red">*</span></label>
                                        <textarea class="form-control inputnumber" name="remarks" placeholder="Enter Cancel Remark" required=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div style="text-align: center">
                                <button type="button" id="cancelRequest" value="no" class="btn btn-info" style="border-radius: 10px;"><i class="fa fa-check-circle-o"></i> Approved</button>
                                <button type="submit" id="hideSavebtn" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;"><i class="fa fa-check-circle"></i> Save</button>
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
        $(document).on('click', '#cancelRequest', function () {
            var value = $(this).val();
            if (value === 'cancel') {
                $('#approvedBox').hide();
                $('#showCancelBox').show();
            } else {
                $('#approvedBox').show();
                $('#showCancelBox').hide();
            }
        });
    });
</script>
@endsection