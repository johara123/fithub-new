<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller {

    public $user;

    public function __construct() {
        date_default_timezone_set("Asia/Dhaka");
        $this->middleware(function ($request, $next) {
            if (!Auth::user()) {
                return redirect('/');
            } else {
                $this->user = Auth::user()->id;
            }
            return $next($request);
        });
    }

    function logout() {
        $logid = Session::get('loginid');
        $timeout = date('g:i A');
        $logdata = array(
            'timeout' => $timeout,
        );
        DB::table('logs')->where('id', $logid)->update($logdata);

        Session::forget('role_id');
        Session::flush();
        Auth::logout();
        $notification = array(
            'setmessage' => 'You Are Loged Out Successfully',
            'alerttype' => 'success'
        );
        return redirect('/')->with($notification);
    }

}
