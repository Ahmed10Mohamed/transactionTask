<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hesto\MultiAuth\Traits\LogsoutGuard;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class LoginController extends Controller
{

    protected function guard()
    {
        return auth();
    }
   
    public function logout(Request $request)
    {
        $this->guard()->logout();
        // $request->session()->invalidate();
        return redirect('login');
    }

}
