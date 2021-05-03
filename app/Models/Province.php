<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    // use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $hidden = [];

    public function regency()
    {
        return $this->hasOne(Regency::class, 'provinces_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'provinces_id');
    }
}
