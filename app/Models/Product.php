<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'categories_id',
        'price',
        'stock',
        'description',
        'slug',
    ];

    protected $hidden = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }

    public function cart()
    {
        return $this->hasOne(Cart::class, 'products_id');
    }

    public function transaction_details()
    {
        return $this->hasMany(TransactionDetail::class, 'transactions_id');
    }
}
