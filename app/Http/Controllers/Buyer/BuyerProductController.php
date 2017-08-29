<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BuyerProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        //
//        $transactions=$buyer->transaction->product;
        //THE ABOVE STATEMENT WILL NOT WORK AS $BUYER->TRANSACTION WILL RETURN A COLLECTION AND PRODUCT METHOD
        //IS NOT DEFINED FOR COLLECTION BUT FOR AN INSTANCE THEREFORE WE WILL USE WITH METHOD
        $products=$buyer->transactions()->with('product')->get();
//        $products=$buyer->transactions()->with('product')->get()->pluck('product'); //PLUCK METHOD NOT FOUND
        //this will return a list of transactions along with products but we want only products ,so use pluck()(SEE ABOVE)
        return $this->showAll($products);

    }


}
