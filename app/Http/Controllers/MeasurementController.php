<?php

namespace App\Http\Controllers;

use App\Http\Requests\measurement_request;
use App\Models\measurement;
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
    public function create_measurement(measurement_request $request)
    {
        $requests=$request->validated();
        measurement::create($requests);
        return redirect()->route('list_order');
    }
    public function MeasurementView(){
        $meas = measurement::all();
        return view('Orders.measurement', compact('meas'));
    }
}
