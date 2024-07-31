<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{
    
    public function index()
    {
        $data['orders'] = Order::get();
        return view('pages.admin.orders.index', $data);
    }
    public function edit($order_id)
    {
        $order_id = ___decrypt($order_id);
        $data['status_array'] =['pending','dispatched','in_transit','out_for_delivery', 'delivered','cancelled','returned'];
        $data['order'] = Order::where('id', $order_id)->first();
        return view('pages.admin.orders.edit', $data);
    }

    public function update(Request $request, $order_id)
    {
        $order_id = ___decrypt($order_id);
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            $this->message = $validator->errors();
        } else {
            $order = Order::find($order_id);
            $order['status'] = $request->status;
           
            $order['updated_by'] = Auth::user()->id;

            

            $order->save();
            $status = str_replace('_', ' ', $request->status);
            $status = ucwords($status);
            $user = User::where('id',$order->user_id)->first();
            $data = [
                'status' => $status,
                'first_name' => $user->first_name,
                'url'=>url('/'),
                'messageContent' => "your order status has been changed as $status",  // 'message' might be reserved, use 'messageContent' instead
            ];
        
            Mail::send('email_templates.order_status', $data, function ($message) use ($user) {
                $message->to($user->email)->subject('Order status change');
            });
            $this->status = true;
            $this->modal = true;
            $this->redirect = url('admin/order_requests');
            $this->message = " Updated Successfully!";
        }
        return $this->populateresponse();
    }
    public function destroy(Request $request, $id)
    {
        if (!empty($request->status)) {
            if ($request->status == 'active') {
                $status = 'inactive';
            } else {
                $status = 'active';
            }
            $users = Order::find(___decrypt($id));
            $users->status = $status;
            $users->save();
        } else {
            Order::destroy(___decrypt($id));
        }
        $this->status = true;
        $this->modal = true;
        $this->redirect = true;
        return $this->populateresponse();
    }

    public function bulkDelete(Request $request)
    {
        $id_string = implode(',', $request->bulk);
        $processID = explode(',', ($id_string));
        foreach ($processID as $idval) {
            $processIDS[] = ___decrypt($idval);
        }
        $update['updated_by'] = Auth::user()->id;
        $update['updated_at'] = now();
        if (Order::whereIn('id', $processIDS)->update($update)) {
            Order::destroy($processIDS);
        }
        $this->status = true;
        $this->redirect = true;
        return $this->populateresponse();
    }

}
