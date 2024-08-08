<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        //sử dụng session để check login
        // echo 'khởi động dashboard';
    }
    public function index()
    {
        return 'Dashboard hi';
    }
}
