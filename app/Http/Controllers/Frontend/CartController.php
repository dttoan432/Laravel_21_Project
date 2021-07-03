<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $items = Cart::content();
        return view('frontend.pages.cart')->with([
            'items' => $items
        ]);
    }

    public function add(Request $request){
        $data = $request->all();
        $product = Product::find($data['id']);
        Cart::add($product->id, $product->name, $data['quantity'], $product->sale_price, 0, [
            'slug' => $product->slug,
            'image' => $product->images[0]->image_url,
            'cost' => $product->origin_price,
        ]);

        echo $data = json_encode($data);
    }

    public function update(Request $request){
        $up = Cart::update($request->rowId, $request->qty);
        echo $data = json_encode($up);
    }

    public function remove($cart_id){
        Cart::remove($cart_id);

        return redirect()->route('frontend.cart.index');
    }

    public function destroy(){
        Cart::destroy();
        return redirect()->route('frontend.cart.index');
    }
}
