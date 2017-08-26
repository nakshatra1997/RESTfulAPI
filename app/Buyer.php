<?php

namespace App;
use App\Transaction;

class Buyer extends User
{
    //
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
        //or return $this->>hasMany(Transaction::class);
    }
}
