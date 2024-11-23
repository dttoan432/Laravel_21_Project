<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $phones      = Product::where([['status', Product::STATUS_BUY], ['category_id', 1]])->offset(0)->limit(10)->get();
        $laptops     = Product::where([['status', Product::STATUS_BUY], ['category_id', 2]])->offset(0)->limit(10)->get();
        $tablets     = Product::where([['status', Product::STATUS_BUY], ['category_id', 3]])->offset(0)->limit(10)->get();
        $clocks      = Product::where([['status', Product::STATUS_BUY], ['category_id', 4]])->offset(0)->limit(10)->get();
        $batterys    = Product::where([['status', Product::STATUS_BUY], ['category_id', 5]])->offset(0)->limit(10)->get();
        $cables      = Product::where([['status', Product::STATUS_BUY], ['category_id', 6]])->offset(0)->limit(10)->get();
        $speaks      = Product::where([['status', Product::STATUS_BUY], ['category_id', 7]])->offset(0)->limit(10)->get();
        $products    = Product::where('status', Product::STATUS_BUY)->orderBy('created_at', 'DESC')->offset(0)->limit(10)->get();
        return view('frontend.home')->with([
            'products'   => $products,
            'phones'     => $phones,
            'laptops'    => $laptops,
            'tablets'    => $tablets,
            'clocks'     => $clocks,
            'batterys'   => $batterys,
            'cables'     => $cables,
            'speaks'     => $speaks,
        ]);
    }
}
