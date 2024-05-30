<?php

namespace App\Http\Controllers;

use App\Models\UserApps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index()
    {
        return view('web.admin.home.index', [
            'bulanan' => 10000000,
            'user' => UserApps::count()
        ]);
    }

    function logOut()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
