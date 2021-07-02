<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
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
        $data['order_date'] = Carbon::now();

        $items = Cart::content();
        $order = Order::create($data);
        foreach ($items as $item){
            $order->products()->attach($item->id, [
                'price' => $item->price,
                'quantity' => $item->qty,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        Cart::destroy();



        dd(1);
        return redirect()->route('frontend.cart.index');

    }
}
