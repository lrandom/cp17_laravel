<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use Database\Factories\PostFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        //$this->call(ProductSeeder::class);
        //Product::factory(50)->create();
        //Post::factory(10)->create();
       // Category::factory(10)->create();
        Order::factory(10)->create();
    }
}
