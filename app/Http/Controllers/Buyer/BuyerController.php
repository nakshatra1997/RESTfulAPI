<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BuyerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|string
     */

    public function index()
    {
        //
        $buyers=Buyer::has('transactions')->get();
        return $this->showAll($buyers);
        //return response not visible
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function show(Buyer $buyer)
    {
        //in this case we can not use Buyer $buyer in show's argument as there is one restriction that it must have
        //atleast 1 transaction therefore we must use global scope which automatically add this restriction
        //see scopes/buyerScope.php
        return $this->showOne($buyer);

    }


}
