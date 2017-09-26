<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;

class Image extends Model
{
    protected $guarded = [];

    public function products()
    {
       return $this->hasMany(Image::class);
    }
}
