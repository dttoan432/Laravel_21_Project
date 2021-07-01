<?php

namespace Database\Seeders;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->truncate();
        for ($i = 1; $i < 5; $i++){
            DB::table('orders')->insert([
                'user_id' => $i,
                'total_price' => $i + 10000,
                'status' => 0,
                'order_date' => Carbon::now(),
            ]);
            $orders = Order::find($i);
            $orders->products()->attach([$i, $i+1], [
                'price' => 10000,
                'quantity' => 1,
            ]);
        }
    }
}
