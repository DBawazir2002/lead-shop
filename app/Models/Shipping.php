<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'track_number',
        'arrival_time',
        'order_id',
        'shipping_provider_id',
        'shipping_method_id',
    ];

    protected function casts(): array
    {
        return [
            'arrival_time' => 'datetime',
            'shipping_provider_id' => 'object',
            'shipping_method_id' => 'object',
            'order_id' => 'object',
        ];
    }

    public function shipping_method(): BelongsTo
    {
        return $this->belongsTo(ShippingMethod::class,'shipping_method_id');
    }

    public function shipping_provider(): BelongsTo
    {
        return $this->belongsTo(ShippingProvider::class,'shipping_provider_id');
    }

    public function order(): HasOne
    {
        return $this->hasOne(Order::class,'order_id');
    }


}
