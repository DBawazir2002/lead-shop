<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'city_id',
        'user_id',
        'street',
        // 'is_active'
    ];

    // protected function casts(): array
    // {
    //     return [
    //         'country_id' => 'object',
    //         'city_id' => 'object',
    //         'user_id' => 'object',
    //         'street' => 'string'
    //     ];
    // }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
