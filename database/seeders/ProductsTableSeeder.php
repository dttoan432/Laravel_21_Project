<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('products')->truncate();
        for ($i = 1; $i < 100; $i++) {
            $name = 'SmartPhone' . $i;
            DB::table('products')->insert([
                'name'          => $name,
                'slug'          => Str::slug($name),
                'quantity'      => 200,
                'origin_price'  => 15990000,
                'sale_price'    => 22990000,
                'content'       => 'Demo sản phẩm',
                'user_id'       => 1,
                'category_id'   => 1,
                'trademark_id'  => 4,
                'status'        => 2,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);
        }
    }
}
