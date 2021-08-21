<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 10; $i++) {
            DB::table('products')->insert([
                'price' => '100',
                'name' => 'Giày Bitis '.$i,
                'content' => 'Giày Việt Nam bền đẹp',
                'category_id' => 3,
                'keyword'=>'Bitist'
            ]);
        }
    }
}
