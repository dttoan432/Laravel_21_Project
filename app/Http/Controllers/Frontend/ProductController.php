<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('frontend.pages.product')->with([
            'product'   => $product
        ]);
    }

    public function search(Request $request){
        $keyWord = $request->get('keyword');

        $search = Product::where('name', 'LIKE', '%'. $keyWord .'%')->paginate(16);

        return view('frontend.pages.search')->with([
            'products' => $search
        ]);
    }

    public function autocomplete_ajax(Request $request){
        $data = $request->all();

        if ($data['query']){
            $product = Product::where('status', 1)->where('name', 'LIKE', '%'. $data['query'] .'%')->get();
            $output = '<ul class="dropdown-menu" style="display: block; position: relative">';
            foreach ($product as $key => $val) {
                $output .= '<li class="li_search_ajax" style="margin-left: 15px;"><a href="'. route('frontend.product.show', $val->slug).'">'. $val->name .'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
