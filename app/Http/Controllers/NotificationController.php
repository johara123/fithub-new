<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Notification;
use App\Models\Memberschedule;
use App\Models\User;

class NotificationController extends Controller {

    public $user;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if (!Auth::user()) {
                return redirect('/');
            } else {
                $this->user = Auth::user()->id;
            }
            return $next($request);
        });
    }

    function getallnotification() {
        $result = Notification::where('status', 0)->count();
        echo $result;
    }

    function viewallnotifications() {
        $notification = Notification::orderBy('id', 'desc')->where('status', 0)->get();
        return view('notification.index', [
            'title' => 'View Notification',
            'notification' => $notification,
        ]);
    }

    function view_new_registration_info(Request $request) {
        $nid = $request->get('nid');
        $from = $request->get('from');
        $notification = Customer::orderBy('id', 'desc')->where('id', $from)->first();
        if (@$notification->paymethod == 'Online') {
            $orderinfo = DB::table('orders')->select('transaction_id')->where('customer_id', $notification->memberidno)->first();
        } else {
            $orderinfo = [];
        }
        return view('notification.view', [
            'title' => 'View Notification',
            'nid' => $nid,
            'fromid' => $from,
            'notification' => $notification,
            'transactionid' => $orderinfo,
        ]);
    }

    function addtocustomerlist(Request $request) {
        $month = date('F-Y');
        $nid = $request->nid;
        $profile_id = $request->profile_id;
        Customer::where('id', $profile_id)->update(['profilestatus' => 1, 'paid_month' => $month]);
        User::where('profile_id', $profile_id)->update(['status' => 1]);
        Notification::where('id', $nid)->update(['status' => 1]);
        $data = [
            'profile_id' => $profile_id,
            'amount' => $request->packageamt,
            'paid' => $request->packageamt,
            'ptype' => $request->paymethod,
            'paidmonth' => date('F-Y'),
        ];
        DB::table('paymnets')->insert($data);

        $message = array(
            'setmessage' => "Customer Profile Activated Successfully",
            'alerttype' => 'success'
        );
        return redirect('/customerlist')->with($message);
    }

    function cancelcustomerlist(Request $request) {
        $nid = $request->nid;
        $profile_id = $request->profile_id;
        $remarksdate = date('Y-m-d g:i A');
        $remarks = $request->remarks;
        Customer::where('id', $profile_id)->update(['profilestatus' => 2, 'deny_remarks' => $remarks, 'deny_date' => $remarksdate]);
        User::where('profile_id', $profile_id)->update(['status' => 0]);
        Notification::where('id', $nid)->update(['status' => 1, 'deny_remarks' => $remarks, 'deny_date' => $remarksdate]);
        $message = array(
            'setmessage' => "Customer Registration Canceled Successfully",
            'alerttype' => 'success'
        );
        return redirect('/customerlist')->with($message);
    }

    function check_duplicate_usernamer(Request $request) {
        $user = $request->get('value');
        $result = User::where('username', $user)->count();
        return $result;
    }

    function add_new_schedule_request(Request $request) {
        $nid = $request->get('nid');
        $from = $request->get('from');
        $notification = Customer::orderBy('id', 'desc')->where('id', $from)->first();
        return view('notification.schedule', [
            'title' => 'Member Class Schedule Request',
            'nid' => $nid,
            'fromid' => $from,
            'notification' => $notification,
            'memberschedule' => Memberschedule::with('class', 'trainer')->where('profile_id', $from)->where('appstatus', 0)->get()
        ]);
    }

    public function approve_member_schedule(Request $request) {
        $nid = $request->nid;
        $profile_id = $request->profile_id;
        
        foreach ($request->get_schedule_id as $key => $value) {
            $data = [
                'appstatus' => 1,
            ];
            Memberschedule::where('id', $request->get_schedule_id[$key])->update($data);
        }
        
        Memberschedule::where('profile_id', $profile_id)->where('appstatus', 0)->delete();
        
        Notification::where('id', $nid)->update(['status' => 1]);
        $notification = array(
            'setmessage' => "Request Updated Successfully!",
            'alerttype' => 'success'
        );
        return redirect('customerlist')->with($notification);
    }

}
