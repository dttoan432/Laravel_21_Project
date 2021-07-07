<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        return view('frontend.pages.account');
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = Carbon::now();
        $user = User::find($id);

        if ($data['password'] == null) {
            $data['password'] = $user->password;
        } else {
            $data['password'] = bcrypt($request->get('password'));
        }
        $user->update($data);

        if ($user) {
            return back();
        } else {
            return back();
        }
    }

    public function order(Request $request)
    {
        $orders = Order::where('user_id', $request->get('user_id'))->orderBy('status', 'ASC')->get();
        return view('frontend.pages.order')->with([
            'orders' => $orders
        ]);
    }

    public function orderDetail(Request $request){
        $id = $request->get('id');
        $details = Order::where('id', $id)->first();
        $arr = array();
        foreach ($details->products as $detail){
            $gets[] = array(
                'name'      => $detail->name,
                'price'     => $detail->pivot->price,
                'quantity'  => $detail->pivot->quantity,
            );
        }
        $arr = array_merge($arr, $gets);
        echo $data = json_encode($arr);
    }
}
