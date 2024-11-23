<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Đặc sản núi rừng',
            'Đặc sản sông biển',
            'Nông sản',
            'Ngũ cốc dinh dưỡng',
            'Hải sản Bạch Long Vĩ',
            'Đặc sản bánh kẹo',
            'Thảo dược quý',
        ];
        DB::table('categories')->truncate();
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'slug' => Str::slug($category),
                'parent_id' => 0,
                'user_id' => 1,
                'depth' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
