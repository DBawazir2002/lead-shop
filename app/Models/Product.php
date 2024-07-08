<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'slug',
        'category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function cards(): BelongsToMany
    {
        return $this->belongsToMany(Card::class,'cards_products','product_id','card_id');
    }

    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(Collection::class,'collections_products','product_id','collection_id');
    }

    public function collection($product)
    {
        return $this->collections()->where('product_id',$product->id)->get();
    }

    public function rates(): HasMany
    {
        return $this->hasMany(Rate::class);
    }
}
