<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ] ;

    public function products(){
        return $this->belongsToMany(Product::class,'collections_products','collection_id','product_id');
    }

    public function product($product){
        $this->products()->attach($product->id);
    }

    public function removeProduct($product){
        $this->products()->detach($product->id);
    }
}
