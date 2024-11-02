<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ColorImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_color_id',
        'image_url',
    ];
    public function productColor()
    {
        return $this->belongsTo(ProductColor::class);
    }
}
