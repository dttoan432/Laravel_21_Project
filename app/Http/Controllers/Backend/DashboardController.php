<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $products = Product::orderBy('updated_at', 'DESC')->paginate(5);
        $countProducts = Product::all();
        return view('backend.dashboard')->with([
            'products' => $products,
            'countProducts' => $countProducts,
            'users' => $users
        ]);
    }

    public function option(Request $request)
    {
        $data = $request->except('_token');
        $key = $request->get('key');
        $val = $request->get('val');
        $list = [];
        $merge = [];
        for ($i = 0; $i < count($key); $i++){
            $list = [$key[$i] => $val[$i]];
            $merge = array_merge($merge, $list);
        }

        dd($merge);
        $merge = array_merge($key, $val);
        dd($merge);
    }
}
