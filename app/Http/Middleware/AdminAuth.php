<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth {

    public function handle($request, Closure $next) {
        if (Auth::user()) {
            $role = Auth::user()->role_id;
        } else {
            return redirect('/');
        }
        if ($role == 2) {
            return redirect()->to('member');
        }
        return $next($request);
    }

}
