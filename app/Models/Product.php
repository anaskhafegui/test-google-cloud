<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function productPictures()
    {
        return $this->hasMany(ProductPicture::class);
    }

    public function serviceProducts()
    {
        return $this->hasMany(ServiceProduct::class);
    }

    public function productDates()
    {
        return $this->hasMany(ProductDate::class);
    }
}
