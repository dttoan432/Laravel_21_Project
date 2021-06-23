<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id){
        $category = Category::where('id', $id)->first();
        $products = Product::where('category_id', $id)->orderBy('created_at', 'DESC')->paginate(16);

//        foreach ($products as $product){
//            dd($product->images[0]->name);
//        }
        return view('frontend.category')->with([
            'products'      => $products,
            'category'      => $category
        ]);
    }
}
