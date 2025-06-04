<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showStatus()
    {
        $statuses = [
            'Новый заказ',
            'Отменен',
            'Производятся замеры',
            'У мастера',
            'Готов',
        ];
        return view('orders.create_order', compact('statuses'));
    }

    public function createOrder(CreateOrderRequest $request)
    {
        Order::create($request->validated());
        return redirect()->route('list_order');
    }

    public function listOrders()
    {
        $orders = Order::all();
        return view('orders.list_order', compact('orders'));
    }

    public function listOrderFull()
    {
        $orders = Order::with('measurements', 'specifications')->get();
        return view('orders.list_order_full', compact('orders'));
    }

    public function updateStatus(Request $request)
    {
        if ($request->status === '') {
            return redirect()->back();
        }
        $order = Order::find($request->id);
        $order->order_status = $request->status;
        $order->save();
        return redirect()->back();
    }
}
