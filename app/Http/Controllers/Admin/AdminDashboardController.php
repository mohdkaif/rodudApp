<?php

namespace App\Http\Controllers\Admin;

use App\Models\CustomerSupport;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;


class AdminDashboardController extends Controller
{
    public function index()
    {
        $data['user_count'] = User::count();
        $data['support_count'] = CustomerSupport::count();
        $data['order_count'] = Order::count();
        return view('pages.admin.dashboard', $data);
    }
}
