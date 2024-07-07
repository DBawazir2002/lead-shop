<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'quantity',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class,'cards_products','card_id','product_id');
    }

    public function product($product){
        $this->products()->attach($product->id);
    }

    public function removeProduct($product){
        $this->products()->detach($product->id);
    }

}
