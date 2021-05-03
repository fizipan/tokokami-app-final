<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    // use HasFactory;

    protected $fillable = [
        'name',
        'provinces_id',
        'city_id',
        'name',
    ];

    protected $hidden = [];

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinces_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'regencies_id', 'city_id');
    }
}
