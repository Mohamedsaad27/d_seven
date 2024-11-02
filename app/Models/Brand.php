<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'image',
        'is_active',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function getImage($value)
    {
        return asset($value);
    }

}
