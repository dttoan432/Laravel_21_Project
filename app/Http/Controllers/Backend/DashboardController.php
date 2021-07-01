<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $products = Product::orderBy('created_at', 'DESC')->offset(0)->limit(10)->get();
        $countProducts = Product::all()->count();
        $orders = Order::all()->count();
        return view('backend.dashboard')->with([
            'products' => $products,
            'countProducts' => $countProducts,
            'users' => $users,
            'orders' => $orders
        ]);
    }
}
