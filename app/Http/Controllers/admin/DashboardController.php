<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.admin.content.dashboard');
    }

    public function profile()
    {
        return view('backend.admin.content.profile');
    }
}
