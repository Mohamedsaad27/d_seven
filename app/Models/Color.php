<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['name_en', 'name_ar'];

    public function productColors()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
