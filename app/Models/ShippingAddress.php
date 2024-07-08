<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_id'
        ];

    protected function casts(): array
    {
        return [
          //  'address_id' => 'object',
            'user_id' => 'object',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class,'address_id');
    }

}
