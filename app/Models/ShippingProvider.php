<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShippingProvider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
        ];

    public function shippings(): HasMany
    {
        return $this->hasMany(Shipping::class);
    }

    public function shippingMethods(): HasMany
    {
        return $this->hasMany(ShippingMethod::class);
    }

    public function shippingsMethod($method): Collection
    {
        return $this->shippingMethods()->where('id', $method->id)->get();
    }
    
}
