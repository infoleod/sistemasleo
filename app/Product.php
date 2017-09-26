<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Image;

class Product extends Model
{
    // Que todos los campos se puedan utilizar
    protected $guarded = [];

    // Creamos una function para que devuelva el precio
    public function getPriceAttribute($value)
    {
        return $value / 100;
    }

    // Creamos una function para que devuelva el precio
    public function priceText()
    {
        return '$ ' . $this->price;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
