<?php

namespace App;
use App\Category;
use App\Seller;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const UNAVAILABLE_PRODUCT='unavailable';
    const AVAILABLE_PRODUCT='available';

    protected $fillable=[
        'name',
        'description',
        'quantity',
        'status',
        'image',
        'seller_id',
    ];
    public function isAvailable()
    {
         $this->status==Product::AVAILABLE_PRODUCT;
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    public function seller()
    {
        return $this->belongsTo('App\Seller');
    }
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
