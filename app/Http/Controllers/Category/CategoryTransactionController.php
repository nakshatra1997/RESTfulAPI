<?php

namespace App\Http\Controllers\Category;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CategoryTransactionController extends ApiController
{public function __construct()
{
    parent::__construct();
}
    /**
     * Display a listing of the resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        //
        $transactions = $category->products()
            ->with('transactions')
            ->get();
        return $this->showAll($transactions);
    }
}
