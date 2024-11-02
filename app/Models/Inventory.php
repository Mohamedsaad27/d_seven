<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'product_color_id',
        'product_size_id',
        'quantity',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function productColor()
    {
        return $this->belongsTo(ProductColor::class);
    }
    public function productSize()
    {
        return $this->belongsTo(ProductSize::class);
    }
}
