<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'discount_type',
        'discount_amount',
        'starts_at',
        'ends_at',
        'is_active',
    ];
    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_discounts', 'discount_id', 'product_id');
    }
}
