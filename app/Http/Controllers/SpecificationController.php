<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpecificationRequest;
use App\Models\Order;
use App\Models\Specification;
use Illuminate\Http\Request;

class SpecificationController extends Controller
{
    public function create_specification(SpecificationRequest $request)
    {
        $requests = $request->validated();
        Specification::create($requests);
        return redirect()->route('list_order_full');
    }
    public function SpecificationView()
    {

        $orders = Order::doesntHave('specifications')->get();

        return view('orders.specifications', compact('orders'));
    }

}
