<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'photo',
    ];

    protected $hidden = [];

    public function account_numbers()
    {
        return $this->hasMany(AccountNumber::class, 'payments_id', 'id');
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'payments_id');
    }
}
