<?php

namespace App\Http\Controllers;

use App\Http\Requests\specificationRequest;
use App\Models\order;
use App\Models\specification;
use Illuminate\Http\Request;

class SpecificationController extends Controller
{
    public function create_specification(specificationRequest $request)
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
