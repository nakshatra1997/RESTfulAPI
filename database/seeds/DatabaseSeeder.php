<?php

use App\Category;
use App\Product;
use App\Transaction;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //while seeding the mail was also going to the respective seeding entities
        //to avoid this
        User::flushEventListeners();
        Category::flushEventListeners();
        Product::flushEventListeners();
        Transaction::flushEventListeners();
        DB::statement('SET FOREIGN_KEY_CHECKS=0'); //statement method not found
        //with the above statement the database is not going to verify the foreign key
        // $this->call(UsersTableSeeder::class);
        User::truncate(); //why we use truncate coz whenever the seeder will run it will empty the databse and then refill it
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        //since category_product is a pivot table so we can not accesss with the help of the model
        //therefore we will use DB
        DB::table('category_product')->truncate();
        $usersQuantity=200;
        $categoriesQuantity=30;
        $productsQuantity=1000;
        $transactionsQuantity=1000;
        factory(User::class,$usersQuantity)->create();
        factory(Category::class,$categoriesQuantity)->create();
        factory(Product::class,$productsQuantity)->create()->each(
        function($product)
        {   $product= new Product;//coz it was not able to find the categories method
            $categories=Category::all()->random(mt_rand(1,5))->pluck('id');
            $product->categories()->attach($categories);
        }
        );
        factory(Transaction::class,$transactionsQuantity)->create();


    }
}
