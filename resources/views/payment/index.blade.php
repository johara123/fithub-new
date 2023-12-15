@extends('layouts.app')
@section('title',$title)
@section('content')
<div id="postloader"></div>
<section class="content-header">
    <h1>{{$title}}</h1>
    <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="border-radius: 10px;float: right;margin-top:-30px;font-family: Montserrat;color: #fff"><i class="fa fa-paypal" aria-hidden="true"></i> Payment</a>
</section>
<section class="content animated fadeInRight">
    <div class="box-group" id="accordion">
        <div class="panel" style="border: none">
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="box-body" style="border: 2px solid #3c8dbc">
                    <form method="post" action="{{route('gym_payment_update')}}" name="getformdata">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-3">
                                <input type="hidden" name="profile_id" id="set_profile_id">
                                <label>GYM Member<span style="color: red">*</span></label>
                                <div class="form-group">
                                    <select style="width: 100%" name="profileinfo" class="form-control getSelect" required="">
                                        <option value="">Select</option>
                                        @foreach($getmembers as $value)
                                        <option value="{{$value->id}}={{$value->packageamt}}={{$value->due_amount}}">{{$value->memberidno}} => {{$value->fname}} {{$value->lname}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <label>Package Amount<span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="" class="form-control inputnumber" id="set_payable_amount" readonly="">
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <label>Old Due Amount<span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="" class="form-control inputnumber get_old_due_amount" id="set_due_amount" readonly="">
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <label>Payable Amount<span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="payable_amount" class="form-control inputnumber get_payable_amount" id="set_total_payable_amount" readonly="">
                                </div> 
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Paid Amount <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="number" min="1" name="paid_amount" class="form-control inputnumber" id="make_paid_amount" placeholder="Enter Amount" required="">
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <label>Due Amount <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="due_amount" class="form-control inputnumber" id="set_rest_due_amount" readonly="">
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <label>Payment Type<span style="color: red">*</span></label>
                                <div class="form-group">
                                    <select name="paid_type" class="form-control inputnumber" required="">
                                        <option value="">Select Type</option>
                                        <option value="Cash">Cash</option>
                                        <option value="bKash">bKash</option>
                                        <option value="Rocket">Rocket</option>
                                        <option value="Nogod">Nogod</option>
                                    </select>
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <label>Payment Month<span style="color: red">*</span></label>
                                <div class="form-group">
                                    <select style="width: 100%" name="paid_month" class="form-control getSelect" required="">
                                        <option value="">Select Month</option>
                                        @foreach($getmonths as $value)
                                        <option value="{{$value->month}}-{{date('Y')}}">{{$value->month}}-{{date('Y')}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div>
                        </div><br>
                        <center>
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')" style="border-radius: 10px;margin-top: 25px;"><i class="fa fa-paypal"></i> Pay</button>
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
                            <th style="text-align: center">Member</th>
                            <th style="text-align: center">Member ID</th>
                            <th style="text-align: center">Amount</th>
                            <th style="text-align: center">Paid</th>
                            <th style="text-align: center">Due</th>
                            <th style="text-align: center">Paid Method</th>
                            <th style="text-align: center">Paid Month</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($gympaymentstatus as $value) {
                            ?>
                            <tr>
                                <td style="text-align: center"><?= $i ?></td>
                                <td style="text-align: center"><?= @$value->profile->fname ?> <?= @$value->profile->lname ?></td>
                                <td style="text-align: center"><?= @$value->profile->memberidno ?></td>
                                <td style="text-align: center"><?= $value->amount ?></td>
                                <td style="text-align: center"><?= $value->paid ?></td>
                                <td style="text-align: center"><?= $value->due ?></td>
                                <td style="text-align: center"><?= $value->ptype ?></td>
                                <td style="text-align: center"><?= $value->paidmonth ?></td>
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
        $(document).on('change', 'select[name="profileinfo"]', function () {
            var values = $(this).val();
            var profileinfo = values.split('=');
            $("#set_profile_id").val(profileinfo[0]);
            $("#set_payable_amount").val(profileinfo[1]);
            $("#set_due_amount").val(profileinfo[2]);
            $("#set_total_payable_amount").val(parseInt(profileinfo[1]) + parseInt(profileinfo[2]));
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('keyup', '#make_paid_amount', function () {
            var values = $(this).val();
            var payable_amount = $('.get_payable_amount').val();
            if (values) {
                var rest_due = parseInt(payable_amount) - parseInt(values);
            } else {
                var rest_due = 0;
            }
            $("#set_rest_due_amount").val(rest_due);
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#member_gym_payments').addClass('active');
    });
</script>
@endsection