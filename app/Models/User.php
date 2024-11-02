<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_ar',
        'name_en',
        'email',
        'password',
        'phone',
        'profile_image',
        'role',
        'gender',
        'verification_code',
        'verified_at',
        'is_active',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'is_active' => 'boolean'
    ];

    public function getProfileImage($value)
    {
        return asset($value);
    }
    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function recentlyViewedProducts()
    {
        return $this->hasMany(RecentlyViewedProduct::class);
    }
    public function favorite()
    {
        return $this->hasOne(Favorite::class);
    }
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
    public function points()
    {
        return $this->hasOne(UserPoint::class);
    }
    public function getRecentlyViewedProducts()
    {
        return $this->recentlyViewedProducts()->with('product')->get();
    }
    public function getPoints()
    {
        return $this->points()->first();
    }
}
