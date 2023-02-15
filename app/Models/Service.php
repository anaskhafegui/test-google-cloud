<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function serviceProducts()
    {
        return $this->hasMany(ServiceProduct::class);
    }

    public function serviceClass()
    {
        return $this->belongsTo(ServiceClass::class);
    }
}
