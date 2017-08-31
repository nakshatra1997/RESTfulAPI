<?php

namespace App\Providers;

use App\Mail\UserCreated;
use App\Mail\UserMailChanged;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Mail;
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
        User::created(function(User $user)
        {
            Mail::to($user)->send(new UserCreated($user));
        });
        User::updated(function(User $user)
        {
            if($user->isDirty())
            {
                Mail::to($user)->send(new UserMailChanged($user));
            }

        });

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
