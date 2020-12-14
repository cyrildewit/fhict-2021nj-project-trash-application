<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\TrashCan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('management.dashboard.index', [
            'totalCustomersCount' => Customer::count(),
            'totalProductsCount' => Product::count(),
            'totalTrashCansCount' => TrashCan::count(),
        ]);
    }
}
