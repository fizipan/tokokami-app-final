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
        'couriers_id',
        'shipping_price',
        'total_price',
        'transaction_status',
        'shipping_status',
        'resi',
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payments_id');
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class, 'couriers_id');
    }

    public function transaction_details()
    {
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
    }
}
