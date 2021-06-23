<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(){
        return view('frontend.account');
    }

    public function order(){
        return view('frontend.order');
    }
}
