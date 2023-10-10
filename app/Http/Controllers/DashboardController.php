<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    public function show(){
        $orders = Order::all();
        return view('dashboard', compact('orders'));
    }
}
