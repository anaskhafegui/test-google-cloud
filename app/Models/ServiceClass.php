<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceClass extends Model
{
    use HasFactory;

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class);
    }
}
