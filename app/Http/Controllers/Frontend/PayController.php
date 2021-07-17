<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Order;
use App\Models\Product;
use App\Models\Statistic;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class PayController extends Controller
{
    public function pay(Request $request){
        $data = $request->except('_token');
        $data['user_id'] = Auth::user()->id;
        $data['status'] = 0;

        $items = Cart::content();
        $order = Order::create($data);
        foreach ($items as $item){
            $order->products()->attach($item->id, [
                'name'          => $item->name,
                'price'         => $item->price,
                'quantity'      => $item->qty,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]);
        }

        $details = [
            'order_id'  => $order->id,
            'date'      => Carbon::now()->format('d-m-Y'),
            'total'     => Cart::total(),
            'name'      => $order->name,
            'phone'     => $order->phone,
            'address'   => $order->address,
            'qty'       => Cart::count(),
            'products'  => $items
        ];

        Cart::destroy();

        \Mail::to(Auth::user()->email)->send(new SendMail($details));


        if ($order){
            alert()->success('Đặt hàng thành công', 'Vui lòng kiểm tra đơn hàng hoặc email');
        } else {
            alert()->error('Đặt hàng thất bại', 'Vui lòng thử lại');
        }
        return redirect()->route('frontend.index');
    }
}
