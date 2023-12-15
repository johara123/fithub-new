<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller {

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if (Auth::user()) {
                $userid = Auth::user()->id;
            } else {
                $userid = '';
            }
            if (isset($userid) && !empty($userid)) {
                return redirect('/authorization');
            }
            return $next($request);
        });
    }

    public function login() {
//        echo Hash::make('admin');
        return view('layouts/loginpage');
    }

    public function usersaccess(Request $request) {
        date_default_timezone_set("Asia/Dhaka");
        $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
        $username = $request->username;
        //User Name Check
        $usernamecheck = User::where('username', $username)->count();
        if ($usernamecheck == 0) {
            $notification = array(
                'setmessage' => 'Invalid Username !',
                'alerttype' => 'error'
            );
            return redirect('/auth/login')->with($notification);
        }
        //User Status Check
        $result = User::where('username', $username)->where('status', 0)->count();
        if ($result > 0) {
            $notification = array(
                'setmessage' => 'Your access is denied!',
                'alerttype' => 'error'
            );
            return redirect('/auth/login')->with($notification);
        }
        $uresult = User::where('username', $username)->first();
        $credentials = $request->only('username', 'password');
        if (Auth()->attempt($credentials)) {
//            $logintime = date('g:i A');
            $logdata = array(
                'user_id' => $uresult->id,
                'profile_id' => $uresult->profile_id,
                'role_id' => $uresult->role_id,
                'timein' => date('g:i A'),
                'logdate' => date('Y-m-d'),
                'logmonth' => date('F-Y'),
                'logstatus' => 1,
                'loginip' => ipaddress(),
                'logindevice' => device(),
                'loginplatform' => platform(),
                'loginbrowser' => browser(),
            );
            $lastloginid = DB::table('logs')->insertGetId($logdata);
            $data = array(
                'roleid' => $uresult->role_id,
                'loginid' => $lastloginid,
            );
            $request->session()->put($data);
            return redirect('/authorization');
        } else {
            $notification = array(
                'setmessage' => 'Invalid Password !',
                'alerttype' => 'error'
            );
            return redirect('/auth/login')->with($notification);
        }
    }

}
