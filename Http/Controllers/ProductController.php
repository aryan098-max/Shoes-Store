<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    //
    function index(){

        $data = Product::all();
        return view('product',['products'=>$data]);
    }

    function detail($id){
        $data = Product::find($id);
        return view('detail',['product'=>$data]);
    }

    
    function search(Request $req){
       
     $data = Product::where('name','like', '%' .$req->input('query'). '%')->get();
     return view('search',['products'=>$data]);
    }

    function addToCart(Request $req){

        if($req->session()->has('user'))
        {
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/');

        }
        else
        {
            return redirect('/login');
        }
    }

    function buy(){
        return redirect('cartlist');
    }

    static function cartItem(){
        // Data from the database 
        $userId =Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }

    function cartList(){
        // As the data returned by the cart is in object format 
        //inside the cartList.blade.php we have to use object syntax property

        $userId=Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();

        return view('cartList',['products'=>$products]);
    }

    function removeCart($id){
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function order(){
        // using join in product and cart, products and user

        $userId=Session::get('user')['id'];
        $total = $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->sum('products.price');

        return view('order',['total'=>$total]);

    }

    // This function will take the user data 
    function placeOrder(Request $req){
        // accept the data from the form
        $userId=Session::get('user')['id'];
        $allCart = Cart::where('user_id',$userId)->get();

        foreach($allCart as $cart){
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = "pending";
            $order->payment_method = $req->payment;
            $order->payment_status ="pending";
            $order->address = $req->address;
            $order->save();

            // Now deleting the item from the cart as we have place the order
            Cart::where('user_id',$userId)->delete();
        }

        return redirect('/');
    }

    function myorder(){
        // We are putting joins in products and order so don't need cart 
        // So we are going to use orders.instead of cart
        $userId=Session::get('user')['id'];
        $orders = DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$userId)
        ->get();
        return view('myorder',['orders'=>$orders]);


    }

}
