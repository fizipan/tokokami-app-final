<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'code',
        'users_id',
        'payments_id',
        'shipping_price',
        'total_price',
        'transaction_status',
        'shipping_status',
    ];

    protected $hidden = [];
}
