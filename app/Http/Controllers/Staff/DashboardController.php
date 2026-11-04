<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // This looks for resources/views/staff/dashboard.blade.php
        return view('staff.dashboard');
    }
}