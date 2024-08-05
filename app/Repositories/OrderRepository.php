<?php

namespace App\Repositories;

use App\Models\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderRepository implements OrderRepositoryInterface
{
    public function createOrder(Request $request)
    {
        $order = Order::create([
            'user_id' => $request->user()->id,
            'pickup_address' => $request->pickup_address,
            'delivery_address' => $request->delivery_address,
            'size' => $request->size,
            'status' => 'in_transit',
            'weight' => $request->weight,
            'delivery_date_time' => $request->delivery_date_time,
            'pickup_date_time' => $request->pickup_date_time,
        ]);

        $status = ucwords(str_replace('_', ' ', 'in_transit'));
        $user = User::find($request->user()->id);
        $adminEmail = config('mail.admin_address');

        $data = [
            'status' => $status,
            'first_name' => $user->first_name,
            'url' => url('/'),
            'messageContent' => "Your order status has been placed as $status. Order ID is rodud01{$order->id}",
        ];

        Mail::send('email_templates.order_status', $data, function ($message) use ($user, $adminEmail) {
            $message->to($user->email)->cc($adminEmail)->subject('Order Status Notification');
        });

        return $order;
    }

    public function getOrdersByUserId($userId)
    {
        return Order::where('user_id', $userId)->get();
    }
}
