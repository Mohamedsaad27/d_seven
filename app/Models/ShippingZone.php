<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ShippingZone extends Model
{
    use HasFactory;
    protected $fillable = [
        'zone_name',
        'shipping_cost',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
