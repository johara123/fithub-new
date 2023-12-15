<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;

class SslCommerzPaymentController extends Controller {

    public function payViaAjax(Request $request) {
        $post_data = array();
        $post_data['total_amount'] = Session::get('packageamt'); # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique
        # CUSTOMER INFORMATION
        $post_data['cus_name'] = Session::get('fname') . ' ' . Session::get('lname');
        $post_data['cus_email'] = Session::get('email');
        $post_data['cus_add1'] = Session::get('address');
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = Session::get('contact');
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to update as Pending.
        DB::table('orders')->where('transaction_id', $post_data['tran_id'])
                ->updateOrInsert([
                    'name' => $post_data['cus_name'],
                    'email' => $post_data['cus_email'],
                    'phone' => $post_data['cus_phone'],
                    'amount' => $post_data['total_amount'],
                    'status' => 'Pending',
                    'address' => $post_data['cus_add1'],
                    'transaction_id' => $post_data['tran_id'],
                    'currency' => $post_data['currency'],
                    'customer_id' => Session::get('memberidno'),
        ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }

    public function success(Request $request) {
        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');
//
//        $sslc = new SslCommerzNotification();
//        return $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

        DB::table('orders')->where('transaction_id', $tran_id)->update(['status' => 'Completed']);
        $notification = array(
            'message' => 'Transaction is successfully Completed',
            'type' => 'success'
        );
        return redirect('/paymentstatus')->with($notification);
    }

    public function fail(Request $request) {
        $tran_id = $request->input('tran_id');
        DB::table('orders')->where('transaction_id', $tran_id)->update(['status' => 'Failed']);
        $notification = array(
            'message' => 'Transaction is Falied',
            'type' => 'error'
        );
        return redirect('/paymentstatus')->with($notification);
    }

    public function cancel(Request $request) {
        $tran_id = $request->input('tran_id');
        DB::table('orders')->where('transaction_id', $tran_id)->update(['status' => 'Canceled']);
        $notification = array(
            'message' => 'Transaction is Invalid',
            'type' => 'warning'
        );
        return redirect('/paymentstatus')->with($notification);
    }

}
