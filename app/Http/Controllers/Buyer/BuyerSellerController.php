<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BuyerSellerController extends ApiController
{ public function __construct()
{
    parent::__construct();
}
    /**
     * Display a listing of the resource.
     *
     * @param Buyer $buyer
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        //
         $sellers=$buyer->transactions()->with('product.seller')->get();
         /*pluck method is not working
         we need to follow this approach
            $sellers=$buyer->transactions()->with('product.seller')
         ->get()
         ->pluck('product.seller')
         ->unique('id')
         ->values();



         */
         return $this->showAll($sellers);
    }
}
