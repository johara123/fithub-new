@extends('layouts.app')
@section('title',$title)
@section('content')
<?php
$orderinfo = DB::table('orders')->select('transaction_id')->where('customer_id', $customerlist->memberidno)->first();
?>
<br>
<a class="btn" href="<?= URL::to('customerlist') ?>" style="border-radius:10px;float: left;margin-top:-10px;margin-left: 10px;background:#000;color: #fff"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
<button class="btn btn-primary" onclick="printDi('printarea')" style="border-radius:10px;float: right;margin-top:-10px;margin-left: 20px;margin-right: 10px;"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
<br>
<section class="content animated fadeInRight">
    <div class="box" style="border: 2px solid #3c8dbc">
        <div class="box-body">
            <div class="panel-content" id="printarea">
                <center>
                    <h4 style="font-family: Montserrat;font-weight: bold"><?= $title ?></h4>
                </center>
                <table class="table table-bordered" style="">
                    <tr>
                        <td><span style=""><b>Membership ID</b> :</span></td>
                        <td><span style=""><?= $customerlist->memberidno ?></span></td>
                    </tr>
                    <tr>
                        <td><span style=""><b>Name</b> :</span></td>
                        <td><span style=""><?= $customerlist->fname ?> <?= $customerlist->lname ?></span></td>
                    </tr>
                    <tr>
                        <td><span style=""><b>Gender</b> :</span></td>
                        <td><span style=""><?= $customerlist->gender ?></span></td>
                    </tr>
                    <tr>
                        <td><span style=""><b>Email Address</b> :</span></td>
                        <td><span style=""><?= $customerlist->email ?></span></td>
                    </tr>
                    <tr>
                        <td><span style=""><b>Contact Number</b> :</span></td>
                        <td><span style=""><?= $customerlist->contact ?></span></td>
                    </tr>
                    <tr>
                        <td><span style=""><b>Occupation</b> :</span></td>
                        <td><span style=""><?= $customerlist->occupation ?></span></td>
                    </tr>
                    <tr>
                        <td><span style=""><b>Weight</b> :</span></td>
                        <td><span style=""><?= $customerlist->weight ?></span></td>
                    </tr>
                    <tr>
                        <td><span style=""><b>Reason</b> :</span></td>
                        <td><span style=""><?= $customerlist->reason ?></span></td>
                    </tr>
                    <tr>
                        <td><span style=""><b>Package</b> :</span></td>
                        <td><span style=""><?= $customerlist->package ?></span></td>
                    </tr>
                    <tr>
                        <td><span style=""><b>Package Amount</b> :</span></td>
                        <td><span style=""><?= $customerlist->packageamt ?> BDT</span></td>
                    </tr>
                    <tr>
                        <td><span style=""><b>Transaction ID NO.</b> :</span></td>
                        <td><span style=""><?= @$orderinfo->transaction_id ?></span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function printDi(printarea) {
        var printContents = document.getElementById(printarea).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
<script>
    $(document).ready(function () {
        $('#customerlist').addClass('active');
    });
</script>
@endsection