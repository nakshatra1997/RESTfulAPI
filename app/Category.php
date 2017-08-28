<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    use softDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=[
        'name',
        'description',
    ];
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
