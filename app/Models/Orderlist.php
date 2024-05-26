<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderlist extends Model
{
    use HasFactory;

    protected $table = 'orderlist';

    protected $fillable = ['id_customer', 'order_date', 'customer_name', 'status', 'total_amount', 'payment_method'];
}
