<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddTruckRequestController extends Controller
{
    public function submitForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pickup_address' => 'required|string',
            'delivery_address' => 'required|string',
            'size'=>'required',
            'weight'=>'required',
            'pickup_date_time'=>'required',
            'delivery_date_time'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
       //dd($request->all());

        $formSubmission = Order::create([
            'user_id' => $request->user()->id,
            'pickup_address' => $request->pickup_address,
            'delivery_address' => $request->delivery_address,
            'size' => $request->size,
            'weight' => $request->weight,
            'delivery_date_time' => $request->delivery_date_time,
            'pickup_date_time' => $request->pickup_date_time,
        ]);

        return response()->json(['message' => 'Your Request submited successfully', 'data' => $formSubmission]);
    }

    public function orderList(Request $request){
        $orderList = Order::where('user_id',$request->user()->id)->get();
        return response()->json(['message' => ' successfully', 'data' => $orderList]);
    }
}
