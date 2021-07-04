<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Statistic;
use App\Models\User;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(25);
        return view('backend.orders.index')->with([
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('backend.orders.show')->with([
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = Carbon::now();
        $order = Order::where('id', $id)->first();
        $order->update($data);
        if ($order->status == 3){
            $date = Carbon::now()->format('Y-m-d');

            foreach ($order->products as $item){
                if ($warehouse = Warehouse::where([['sale_date', $date], ['product_id', $item->id]])->first()){
                    $warehouse->sold += $item->pivot->quantity;
                    $warehouse->save();

                    $product = Product::where('id', $item->id)->first();
                    $product->quantity -= $item->pivot->quantity;
                    $product->save();
                    if ($product->quantity == 0){
                        $product->status = 2;
                        $product->save();
                    }
                    Cache::forget('productFE');
                } else{
                    $warehouse = new Warehouse();
                    $warehouse->product_id = $item->id;
                    $warehouse->sold = $item->pivot->quantity;
                    $warehouse->sale_date = Carbon::now();
                    $warehouse->created_at = Carbon::now();
                    $warehouse->updated_at = Carbon::now();
                    $warehouse->save();

                    $product = Product::where('id', $item->id)->first();
                    $product->quantity -= $item->pivot->quantity;
                    $product->save();
                    if ($product->quantity == 0){
                        $product->status = 2;
                        $product->save();
                    }
                    Cache::forget('productFE');
                }
            };

            $profit = $order->total_price;
            $qty = 0;

            if ($statistic = Statistic::where('order_date', $date)->first()){
                foreach ($order->products as $item){
                    $profit -= $item->pivot->quantity * $item->origin_price;
                    $qty += $item->pivot->quantity;
                }

                $statistic->revenue += $order->total_price;
                $statistic->profit += $profit;
                $statistic->quantity += $qty;
                $statistic->total_order += 1;
                $statistic->updated_at = Carbon::now();
                $statistic->save();

            } else {
                foreach ($order->products as $item){
                    $profit -= $item->pivot->quantity * $item->origin_price;
                    $qty += $item->pivot->quantity;
                }

                $statistic = new Statistic();
                $statistic->order_date = $date;
                $statistic->revenue = $order->total_price;
                $statistic->profit = $profit;
                $statistic->quantity = $qty;
                $statistic->total_order = 1;
                $statistic->created_at = Carbon::now();
                $statistic->updated_at = Carbon::now();
                $statistic->save();
            }
        }

        if ($order){
            return redirect()->route('backend.order.index')->with("success",'Cập nhật thành công');
        }
        return redirect()->route('backend.order.index')->with("error",'Cập nhật thất bại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->products()->detach();
        $order->delete();

        if ($order){
            return redirect()->route('backend.order.index')->with("success",'Xóa thành công');
        }
        return redirect()->route('backend.order.index')->with("error",'Xóa thất bại');
    }
}
