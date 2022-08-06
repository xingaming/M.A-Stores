<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\Order_detail;
use App\Models\Order;
class OrderController extends Controller
{
    public function manage_order(){
        $order = Order::orderby('created_at','DESC')->get();
        return view('admin.delivery.manage_order')->with(compact('order'));
    }
    public function view_order($order_code){
        $order_details = Order_detail::where('order_code',$order_code)->get();
        $order = Order::where('order_code',$order_code)->get();
        foreach($order as $key => $ord) {
            $shipping_id = $ord->shipping_id;
        }
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();
        $order_details = Order_detail::with('product_id')->where('order_code',$order_code)->get();
        return view('admin.delivery.view_order')->with(compact('order_details','shipping','order_details'));
    }
}
