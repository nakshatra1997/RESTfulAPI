<?php

namespace App;
use App\Scopes\BuyerScope;
use App\Transaction;

class Buyer extends User
{
    //
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new BuyerScope);
    }
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
        //or return $this->>hasMany(Transaction::class);
    }
}
