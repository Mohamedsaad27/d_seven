<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class UserPoint extends Model
{
    use HasFactory;
    protected $table = 'user_points';
    protected $fillable = [
        'user_id',
        'points',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
