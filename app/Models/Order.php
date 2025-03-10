<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'date',
        'code',
        'status',
        'user_id',
        'payment_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function order_address(): HasOne
    {
        return $this->hasOne(OrderAddress::class);
    }

    public function order_items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function products(): Collection
    {
        return $this->order_items()->with('product')->get();
    }
}
