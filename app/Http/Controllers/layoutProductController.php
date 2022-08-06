<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;
use App\Models\Cart;
use App\Models\Shipping;
use App\Models\Order_detail;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Location;

class layoutProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        return view('index', compact('products'));
    }
    public function list()
    {
        return view('list');
    }
    public function form(Request $request)
    {
        $city = City::orderby('matp', 'ASC')->get();
        return view('form')->with('city', $city);
    }
    public function select_delivery_home(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "city") {
                $select_province = Province::where('matp', $data['ma_id'])->orderby('maqh', 'ASC')->get();
                $output .= '<option>---Chọn Quận Huyện---</option>';
                foreach ($select_province as $key => $province) {
                    $output .= '<option value="' . $province->maqh . '">' . $province->name_quanhuyen . '</option>';
                }
            } else {
                $select_wards = Wards::where('maqh', $data['ma_id'])->orderby('xaid', 'ASC')->get();
                $output .= '<option>---Chọn Xã Phường---</option>';
                foreach ($select_wards as $key => $wards) {
                    $output .= '<option value="' . $wards->xaid . '">' . $wards->name_xaphuong . '</option>';
                }
            }
        }
        echo $output;
    }
    public function calculate_fee(Request $request)
    {
        $data = $request->all();
        if ($data['matp']) {
            $feeship = FeeShip::where('fee_matp', $data['matp'])->where('fee_maqh', $data['maqh'])->where('fee_xaid', $data['xaid'])->first();
            $a = $feeship->fee_feeship;
            echo $a;
            $request->Session()->put('fee', $feeship->fee_feeship);
            Session::save();
            // foreach ($feeship as $key => $fee) {
            //     $a=$request->Session()->put('fee', $fee->fee_feeship);
            //     echo $a;
            // }
        }
    }
    public function confirm_order(Request $request)
    {
        $data = $request->all();
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->save();

        $shipping_id = $shipping->shipping_id;
        $checkout_code = substr(md5(microtime()), rand(0, 26), 5);

        $order = new Order;
        $order->shipping_id = $shipping_id;
        $order->order_code = $checkout_code;
        $order->order_status = 1;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->created_at = now();
        $order->save();

        if (Session::get('cart')) {
            foreach (Session::get('cart')->products as $item) {

                $order_details = new Order_detail;
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $item['productInfo']->id;
                $order_details->product_name = $item['productInfo']->name;
                $order_details->product_price = $item['productInfo']->price;
                $order_details->product_quantity = $item['quanty'];
                // $order_details->product_feeship = $data['order_fee'];
                $order_details->save();
            }
        }
    }
    public function login()
    {
        return view('login.login');
    }
    public function signup()
    {
        return view('login.signup');
    }
}
