<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = DB::table('products')->get();
        foreach ($products as $product){
            DB::table('warehouse')->insert([
                'product_id'    => $product->id,
                'entered'       => 0,
                'sold'          => 0,
                'sale_date'     => Carbon::now(),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);
        }
    }
}
