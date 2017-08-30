<?php

namespace App;
use App\Category;
use App\Seller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use softDeletes;
    const UNAVAILABLE_PRODUCT='unavailable';
    const AVAILABLE_PRODUCT='available';
    protected $dates=['deleted_at'];
    protected $fillable=[
        'name',
        'description',
        'quantity',
        'status',
        'image',
        'seller_id',

    ];
    protected $hidden=['pivot'];
    public function isAvailable()
    {
         $this->status=Product::AVAILABLE_PRODUCT;
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
