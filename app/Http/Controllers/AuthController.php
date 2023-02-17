<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //direct login Page
    public function loginPage () {
        return view('login');
    }

    //direct dashboard
    public function dashboard() {
        return view('admin.userDashboard');
    }
}
