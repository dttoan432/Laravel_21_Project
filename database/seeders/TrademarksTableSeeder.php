<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TrademarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trademarks = [
            'Samsung',
            'Asus',
            'Huawei',
            'Apple',
            'Sony',
            'Oppo',
            'Acer',
            'Xiaomi',
            'Realme',
            'HP',
            'Dell',
            'Lenovo',
            'Microsoft',
            'Energizer',
            'Logitech',
            'Innostyle',
            'Mophie',
            'Anker',
            'JBT',
            'LG',
            'Shinecon',
            'Aukey',
        ];
        DB::table('trademarks')->truncate();
        foreach ($trademarks as $trademark) {
            DB::table('trademarks')->insert([
                'name' => $trademark,
                'slug' => Str::slug($trademark),
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
