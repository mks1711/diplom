<?php

namespace App\Http\Controllers;

use App\Http\Requests\specification_request;
use App\Models\specification;
use Illuminate\Http\Request;

class SpecificationController extends Controller
{
    public function create_specification(specification_request $request)
    {
        $requests=$request->validated();
        specification::create($requests);
        return redirect()->route('list_order');
    }
    public function SpecificationView(){
        $spec = specification::all();
        return view('Orders.specifications', compact('spec'));
    }
}
