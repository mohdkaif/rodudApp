<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pickup_address',
        'delivery_address',
        'size',
        'weight',
        'delivery_date_time',
        'pickup_date_time',
    ];
}
