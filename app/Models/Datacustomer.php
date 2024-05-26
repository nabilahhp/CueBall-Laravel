<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datacustomer extends Model
{
    use HasFactory;

    protected $table ='datacustomer';

    protected $fillable =['id_customer', 'tanggal_login', 'nama_customer', 'phone', 'email',];
}
