<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class Test extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i <95; $i++) {
            Warehouse::create([
                'product_id'    => $i,
                'entered'       => 0,
                'sold'          => 0,
                'sale_date'     => '2022-06-01'
            ]);
        }
    }
}
