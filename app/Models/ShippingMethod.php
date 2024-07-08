<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShippingMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'shipping_provider_id',
        'fee'
    ];

    public function shipping_provider(): BelongsTo
    {
        return $this->belongsTo(ShippingProvider::class,'shipping_provider_id');
    }

    public function shippings(): HasMany
    {
        return $this->hasMany(Shipping::class);
    }

    protected function casts(): array
    {
        return [
            'shipping_provider_id' => 'object',
        ];
    }

}
