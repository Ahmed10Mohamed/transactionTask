<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class userLockController extends Controller
{

   public function __invoke($user_name)
   {
        auth()->logout();

        return view('admin.auth.user_lock',compact('user_name'));
   }
}
