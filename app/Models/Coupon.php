<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'description',
        'start_date',
        'end_date',
        'minimum_order_amount',
        'max_usage',
        'count_usage',
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
