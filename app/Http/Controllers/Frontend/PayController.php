<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Statistic;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PayController extends Controller
{
    public function pay(Request $request){
        $data = $request->except('_token');
        $data['user_id'] = Auth::user()->id;
        $data['status'] = 0;

        $items = Cart::content();
        $order = Order::create($data);
        $money = 0;
        foreach ($items as $item){
            $order->products()->attach($item->id, [
                'name'          => $item->name,
                'price'         => $item->price,
                'quantity'      => $item->qty,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]);
            $money += (int)$item->options->cost * (int)$item->qty;
        }


        $oderProfit = Cart::total() - $money;

        $orderDate = Carbon::now()->format('Y-m-d');
        if ($statisticDate = Statistic::where('order_date', $orderDate)->first()){
            $statisticDate->revenue += (int)Cart::total();
            $statisticDate->profit += $oderProfit;
            $statisticDate->quantity += Cart::count();
            $statisticDate->total_order += 1;
            $statisticDate->save();
        } else {
            $dataStatistic = array(
                'order_date' => $orderDate,
                'revenue' => Cart::total(),
                'profit' => $oderProfit,
                'quantity' => Cart::count(),
                'total_order' => 1,
            );

            $statistic  = Statistic::create($dataStatistic);
        }
        Cart::destroy();

        return redirect()->route('frontend.cart.index');
    }
}
