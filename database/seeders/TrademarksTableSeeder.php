<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Trademark;
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
            // Miền Bắc
            "Hồng Lam",
            "Trà Thái Nguyên",
            "Nước Mắm Cát Hải",

            // Miền Trung
            "Thiên Hương",
            "Trà Cung Đình Huế",
            "Bánh Khô Mè Bà Liễu",
            "Cao Lầu Thanh Hội An",

            // Miền Nam
            "Bà Tôn",
            "Vĩnh Tiến",
            "Kẹo Dừa Bến Tre Thanh Long",
            "Nem Lai Vung Út Thẳng",

            // Tổng hợp
            "Bảo Minh",
            "Quà Quê Việt"
        ];
        $categoryIds = Category::query()->pluck('id')->toArray();
        DB::table('trademarks')->truncate();
        foreach ($trademarks as $trademark) {
            $trademark = Trademark::query()->create([
                'name' => $trademark,
                'slug' => Str::slug($trademark),
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $trademark->categories()->sync($categoryIds);
        }
    }
}
