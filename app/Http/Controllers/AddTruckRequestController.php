<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class AddTruckRequestController extends Controller
{
    public function submitForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pickup_address' => 'required|string',
            'delivery_address' => 'required|string',
            'size' => 'required',
            'weight' => 'required',
            'pickup_date_time' => 'required',
            'delivery_date_time' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $formSubmission = Order::create([
            'user_id' => $request->user()->id,
            'pickup_address' => $request->pickup_address,
            'delivery_address' => $request->delivery_address,
            'size' => $request->size,
            'status' => 'in_transit',
            'weight' => $request->weight,
            'delivery_date_time' => $request->delivery_date_time,
            'pickup_date_time' => $request->pickup_date_time,
        ]);
        $status = str_replace('_', ' ', 'in_transit');
        $status = ucwords($status);
        $user = User::where('id', $request->user()->id)->first();
        $data = [
            'status' => $status,
            'first_name' => $user->first_name,
            'url' => url('/'),
            'messageContent' => "your order status has been placed as $status order id is rodud01$formSubmission->id",  // 'message' might be reserved, use 'messageContent' instead
        ];

        Mail::send('email_templates.order_status', $data, function ($message) use ($user) {
            $message->to($user->email)->subject('Order status change');
        });
        Mail::send('email_templates.order_status', $data, function ($message) use ($user) {
            $message->to($user->email)->subject('New Order Request Recieved');
        });
        return response()->json(['message' => 'Your Request submited successfully', 'data' => $formSubmission]);
    }

    public function orderList(Request $request)
    {
        $orderList = Order::where('user_id', $request->user()->id)->get();
        return response()->json(['message' => ' successfully', 'data' => $orderList]);
    }
}
