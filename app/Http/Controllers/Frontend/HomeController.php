<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $products = Cache::remember('productFE', 60, function() {
            return Product::where('status', Product::STATUS_BUY)->orderBy('created_at', 'DESC')->get();
        });

        return view('frontend.home')->with([
            'products' => $products,
        ]);
    }
}
