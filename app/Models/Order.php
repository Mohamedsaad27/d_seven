<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'total_price',
        'shipping_zone_id',
        'status',
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
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

    public static function generateOrderNumber()
    {
        $lastOrder = Order::orderBy('id', 'desc')->first();
        $orderNumber = 'ORD-' . date('Y-m-d') . '-' . strtoupper(substr(uniqid(), -6));

        if ($lastOrder) {
            $lastOrderNumber = $lastOrder->order_number;
            if ($lastOrderNumber) {
                $lastOrderNumberParts = explode('-', $lastOrderNumber);
                if (count($lastOrderNumberParts) >= 3) {
                    $lastOrderNumberSuffix = $lastOrderNumberParts[2];
                    $newSuffix = (int) $lastOrderNumberSuffix + 1;
                    $orderNumber = 'ORD-' . date('Y-m-d') . '-' . $newSuffix;
                }
            }
        }

        return $orderNumber;
    }

    public function getStatusBadgeClass()
    {
        return match ($this->status) {
            'pending' => 'status-pending',
            'processing' => 'status-processing',
            'completed' => 'status-completed',
            'cancelled' => 'status-cancelled',
            default => 'status-pending'
        };
    }

    public function getFormattedTotal()
    {
        return number_format($this->total_price, 2) . ' EGP';
    }

    public function getTotalItems()
    {
        return $this->orderItems->sum('quantity');
    }

    public function getSubtotal()
    {
        return $this->orderItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });
    }

    public function getShippingCost()
    {
        return $this->shippingZone ? $this->shippingZone->shipping_cost : 0;
    }

    // Scope for filtering
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeByDateRange($query, $from, $to)
    {
        return $query->whereBetween('created_at', [$from, $to]);
    }

    public function scopeByShippingZone($query, $zoneId)
    {
        return $query->where('shipping_zone_id', $zoneId);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q
                ->where('id', 'like', "%{$search}%")
                ->orWhere('order_number', 'like', "%{$search}%")
                ->orWhereHas('user', function ($userQuery) use ($search) {
                    $userQuery
                        ->where('name_ar', 'like', "%{$search}%")
                        ->orWhere('name_en', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
        });
    }
}
