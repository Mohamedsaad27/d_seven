<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total_price',
        'shipping_zone_id',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function shippingZone()
    {
        return $this->belongsTo(ShippingZone::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
