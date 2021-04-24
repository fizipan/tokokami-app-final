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

    public function account_number()
    {
        return $this->hasOne(AccountNumber::class, 'payments_id', 'id');
    }
}
