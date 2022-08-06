<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\Cart;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
class AccountController extends Controller
{
    public function Cart(Request $req, $id){
        $products = DB::table('products')->where('id',$id)->first();
        if($products != null){
            $oldCart = Session('cart') ? Session('cart') : null;
            $newCart =new cart($oldCart) ;
            $newCart ->AddCart($products, $id);
            $req -> Session()->put('cart', $newCart);

        }
        return view('cart');
    }

    public function DeleteItemCart(Request $req, $id){
            $oldCart = Session('cart') ? Session('cart') : null;
            $newCart =new cart($oldCart) ;
            $newCart ->DeleteItemCart($id);
            if(Count($newCart->products) > 0){
            $req -> Session()->put('cart', $newCart);
            }
            else{
                $req->session()->forget('cart',$newCart);
            }
            return view('cart');
        }

        public function ListCart(){
            return view('list');
        }

        public function DeleteListItemCart(Request $req, $id){
            $oldCart = Session('cart') ? Session('cart') : null;
            $newCart =new cart($oldCart) ;
            $newCart ->DeleteItemCart($id);
            if(Count($newCart->products) > 0){
                $req -> Session()->put('cart', $newCart);
            }
            else{
                $req->session()->forget('cart',$newCart);
            }
            return view('list_cart');
        }

        public function SaveListItemCart(Request $req, $id, $quanty){
            $oldCart = Session('cart') ? Session('cart') : null;
            $newCart =new cart($oldCart) ;
            $newCart ->UpdateItemCart($id,$quanty);
            $req->Session()->put('cart',$newCart);
            return view('list_cart');
        }
        public function users()
    {
        $users = DB::table('tbaccount')->get();
        return view('admin.users')->with(['users' => $users]);
    }
    public function checkLogin(Request $request)
    {
        if($request->session()->has('user')){
            $request->session()->forget('user');
        }

        $email = $request->email;
        $pwd = $request->pwd;

        $user = DB::table('account')->where('email', $email)->first();

        if ($user != null && $user->password == $pwd) {
            // $request->session()->push('user', $user);
            // push() luu bien mang

            // tao bien session de luu thong tin TK dang nhap thanh cong
            session(['user' => $user]);
            // $request->session()->put('user', $user);

            if ($user->role == 1) {
                 return redirect('admin/users');
               // return redirect()->route('adminuserlist');
            } else {
                 return redirect("user/details/" . $user->accountID);
                //return redirect()->route('userprofile',['id'=>$user->accountid]);
            }
        } else {
            return redirect('login')->with('message', 'Login Fail.');
        }

    }
    public function logout(){
        session()->forget("user");
        return redirect("login");
    }
}


