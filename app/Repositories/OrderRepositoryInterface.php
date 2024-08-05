<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface OrderRepositoryInterface
{
    public function createOrder(Request $request);
    public function getOrdersByUserId($userId);
}
