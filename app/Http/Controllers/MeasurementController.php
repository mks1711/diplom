<?php

namespace App\Http\Controllers;

use App\Http\Requests\measurementRequest;
use App\Models\measurement;
use App\Models\order;
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
    public function create_measurement(measurementRequest $request)
    {
        $requests=$request->validated();
        measurement::create($requests);
        return redirect()->route('list_order_full');
    }
    public function MeasurementView()
    {

        $orders = Order::doesntHave('measurements')->get();

        return view('Orders.measurement', compact('orders'));
    }
}
