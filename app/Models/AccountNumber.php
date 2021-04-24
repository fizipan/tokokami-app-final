<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountNumber extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'number',
        'payments_id',
    ];

    protected $hidden = [];

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payments_id', 'id');
    }
}
