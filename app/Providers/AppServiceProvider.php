<?php

namespace App\Providers;

use App\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191); //why this is not working..???
        Product::updated(function(Product $product)//it was only $product
        {
            if($product->quantity==0&&$product->isAvailable())
            {
                $product->status=Product::UNAVAILABLE_PRODUCT; //it will automatically make the status unavailable
                $product->save();
            }
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
