<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';
    protected $fillable = ['size'];

    public function productSizes()
    {
        return $this->hasMany(ProductSize::class);
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
