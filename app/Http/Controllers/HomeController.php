<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HomeController extends Controller {

    public $user, $role;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if (!Auth::user()) {
                return redirect('/');
            } else {
                $this->user = Auth::user()->id;
                $this->role = Auth::user()->role_id;
            }
            return $next($request);
        });
    }

    public function index() {
        if ($this->role == 1 or $this->role == 2) {
            return redirect('admin');
        }
        if ($this->role == 3) {
            return redirect('member');
        }
    }

}
