<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'table_name',
        'category',
        'booking_date',
        'booking_time',
        'total_price',
        'payment_method',
        'payment_proof',
        'status'
    ];
}
