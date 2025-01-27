<?php

namespace App\Http\Controllers;

use App\Http\Requests\create_order_request;
use App\Models\order;
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
        return view('Orders.create_order', compact('statuses'));
    }
    public function Create_order(create_order_request $request){
        $requests=$request->validated();
        $data=[
            'order_number'=>$requests['order_number'],
            'order_date'=>$requests['order_date'],
            'order_status'=>$requests['order_status'],
            'order_customer'=>$requests['order_customer'],
            'order_address'=>$requests['order_address'],
            'order_name'=>$requests['order_name'],
            'order_description'=>$requests['order_description'],
            'order_size'=>$requests['order_size'],
        ];
        order::create($data);
        return redirect()->route('list_order');
    }
    public function OrderView(){
        $Order = order::all();
        return view('orders.list_order', compact('Order'));
    }
}
