<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products   = Product::where('status', Product::STATUS_BUY)->orderBy('created_at', 'DESC')->get();
        $chargings  = Product::where([['category_id', 10], ['status', Product::STATUS_BUY]])->orderBy('created_at', 'DESC')->get();
        $sounds     = Product::where([['category_id', 11], ['status', Product::STATUS_BUY]])->orderBy('created_at', 'DESC')->get();
        $batterys   = Product::where([['category_id', 7], ['status', Product::STATUS_BUY]])->orderBy('created_at', 'DESC')->get();
        $headphones  = Product::where([['category_id', 12], ['status', Product::STATUS_BUY]])->orderBy('created_at', 'DESC')->get();
        return view('frontend.home')->with([
            'products'      => $products,
            'sounds'        => $sounds,
            'chargings'     => $chargings,
            'batterys'      => $batterys,
            'headphones'     => $headphones
        ]);
    }
}
