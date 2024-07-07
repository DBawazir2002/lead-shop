<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

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

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function cards(){
        return $this->belongsToMany(Card::class,'cards_products','product_id','card_id');
    }

    public function collections(){
        return $this->belongsToMany(Collection::class,'collections_products','product_id','collection_id');
    }

    public function collection($product){
        return $this->collections()->where('product_id',$product->id)->get();
    }
}
