<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\Midtrans\CreateSnapToken;

class OrderController extends Controller
{
    public function detail(string $id){
        $order = Order::find($id);
        return view('orderdetail', compact('order'));
    }
    public function token(string $id){
        $order = Order::find($id);
        $midtrans = new CreateSnapToken($order);
        $snapToken = $midtrans->getSnapToken();
        $order->snap_token = $snapToken;
        $order->save();
        return redirect()->route('order_detail', $order->id);
    }
    public function callback(Request $request){
        if($request->transaction_status == 'capture' || $request->transaction_status == 'settlement'){
            $order = Order::where('id', $request->order_id)->first();
            $order->status = 2;
            $order->save();
        }
    }
}
