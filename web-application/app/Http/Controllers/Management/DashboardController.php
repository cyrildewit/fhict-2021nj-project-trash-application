<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class DashboardController extends Controller
{
    public function index()
    {
        return view('management.dashboard.index', [
            'totalCustomersCount' => Customer::count(),
        ]);
    }
}
