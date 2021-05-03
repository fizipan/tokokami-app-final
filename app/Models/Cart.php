<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    // use HasFactory;

    protected $fillable = [
        'users_id',
        'products_id',
        'amount',
        'subtotal',
        'selected',
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }

    public function scopeCheckProductAvailable($query, $id)
    {
        return $query->where('users_id', Auth::user()->id)
                    ->where('products_id', $id)
                    ->first() ? 'available' : 'unavailable';
    }
}
