<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Warehouse;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PurchaseController extends Controller
{
    public function import(Request $request)
    {
        $suppliers = Supplier::all();
        $items = Cart::content();
        if (Cart::count() < 1 && $request->session()->has('info_supplier')){
            $request->session()->forget('info_supplier');
        }
        return view('backend.purchases.import')->with([
            'suppliers' => $suppliers
        ]);
    }

    public function getProduct(Request $request)
    {
        $id = $request->get('id');
        $supplier = Supplier::where('id', $id)->first();
        echo $data = json_encode($supplier->products);
    }

    public function cart(Request $request){
        $items = Cart::content();
        if (Cart::count() < 1 && $request->session()->has('info_supplier')){
            $request->session()->forget('info_supplier');
        }
        return view('backend.purchases.cart')->with([
            'items' => $items
        ]);
    }

    public function add(Request $request)
    {
        $data = $request->except('_token');
        $supplier = Supplier::find($data['supplier']);
        $product = Product::find($data['product_id']);

        $request->session()->put('info_supplier', $supplier);

        $cart = Cart::add($product->id, $product->name, $data['quantity'], $product->origin_price, 0);
        echo $data = json_encode($cart);
    }

    public function increment(Request $request)
    {
        $cart = Cart::get($request->rowId);
            Cart::update($request->rowId, $cart->qty + 1);
            echo $data = json_encode($cart);
    }

    public function decrement(Request $request)
    {
        $cart = Cart::get($request->rowId);
        Cart::update($request->rowId, $cart->qty - 1);
        echo $data = json_encode($cart);
    }

    public function remove($cart_id)
    {
        Cart::remove($cart_id);
        return redirect()->route('backend.purchase.cart');
    }

    public function destroyCart()
    {
        Cart::destroy();
        return redirect()->route('backend.purchase.cart');
    }

    public function store(Request $request){
        $purchase = new Purchase();
        $purchase->supplier_id    = $request->session()->get('info_supplier')->id;
        $purchase->name           = $request->session()->get('info_supplier')->name;
        $purchase->phone          = $request->session()->get('info_supplier')->phone;
        $purchase->address        = $request->session()->get('info_supplier')->address;
        $purchase->total_price    = Cart::total();
        $purchase->status         = 0;
        $purchase->created_at     = Carbon::now();
        $purchase->updated_at     = Carbon::now();
        $purchase->save();

        $items = Cart::content();
        foreach ($items as $item){
            $purchase->products()->attach($item->id, [
                'name'          => $item->name,
                'price'         => $item->price,
                'quantity'      => $item->qty,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]);
        }

        Cart::destroy();

        if ($purchase){
            return redirect()->route('backend.purchase.order')->with("success",'Đặt hàng thành công');
        }
        return redirect()->route('backend.purchase.order')->with("error",'Đặt hàng thất bại');
    }

    public function order(Request $request){
        $purchase = Purchase::where('status', '>', -1);
        if ($request->has('status')) {
            $purchase->where('status', $request->get('status'));
        }

        if ($request->has('q')){
            $q = $request->get('q');
            $purchase->where('name', 'LIKE', '%'.$q.'%')
                ->orWhere('phone', 'LIKE', '%'.$q.'%');
        }
        $purchase = $purchase->orderBy('created_at', 'DESC')->paginate(20);

        return view('backend.purchases.order')->with([
            'orders' => $purchase
        ]);
    }

    public function update(Request $request, $id){
        $purchase = Purchase::find($id);
        $date = Carbon::now()->format('Y-m-d');
        $purchase->status = $request->get('status');
        $purchase->save();
        if ($request->get('status') == 1){
            foreach ($purchase->products as $item){
                if ($warehouse = Warehouse::where([['sale_date', $date], ['product_id', $item->id]])->first()){
                    $warehouse->entered += $item->pivot->quantity;
                    $warehouse->save();

                    $product = Product::where('id', $item->id)->first();
                    $product->quantity += $item->pivot->quantity;
                    $product->save();

                    Cache::forget('productFE');
                } else{
                    $warehouse = new Warehouse();
                    $warehouse->product_id  = $item->id;
                    $warehouse->entered     = $item->pivot->quantity;
                    $warehouse->sale_date   = Carbon::now();
                    $warehouse->created_at  = Carbon::now();
                    $warehouse->updated_at  = Carbon::now();
                    $warehouse->save();

                    $product = Product::where('id', $item->id)->first();
                    $product->quantity += $item->pivot->quantity;
                    $product->save();

                    Cache::forget('productFE');
                }
            }
        }

        if ($purchase){
            return redirect()->route('backend.purchase.order')->with("success",'Thay đổi thành công');
        }
        return redirect()->route('backend.purchase.order')->with("error",'Thay đổi thất bại');
    }

//    public function destroy(Purchase $purchase)
//    {
//        $purchase->products()->detach();
//        $purchase->delete();
//
//        if ($purchase){
//            return redirect()->route('backend.purchase.order')->with("success",'Xóa thành công');
//        }
//        return redirect()->route('backend.purchase.order')->with("error",'Xóa thất bại');
//    }
}
