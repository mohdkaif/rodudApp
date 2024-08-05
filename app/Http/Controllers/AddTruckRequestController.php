<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddTruckRequestController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

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

        $formSubmission = $this->orderRepository->createOrder($request);

        return response()->json(['message' => 'Your request submitted successfully', 'data' => $formSubmission]);
    }

    public function orderList(Request $request)
    {
        $orderList = $this->orderRepository->getOrdersByUserId($request->user()->id);

        return response()->json(['message' => 'Successfully retrieved orders', 'data' => $orderList]);
    }
}
