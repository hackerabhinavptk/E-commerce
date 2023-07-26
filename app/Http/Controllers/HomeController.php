<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Carts;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class HomeController extends Controller
{
    public function redirect(Request $request)
    {

        $type = Auth::user()->usertype;
        if ($type != 0) {

            return view('admin.home');
        } else {

            return view('home.userpage');
        }
    }

    public function index(Request $request)
    {

        $products = Product::paginate(3);

        return view('home.userpage', ['products' => $products]);

    }

    public function product_details(Request $request, $id = false)
    {

        $details = Product::find($id);
        $category_name = Category::find($details->category);
        return view('home.product_detail', ['detail' => $details, 'category_name' => $category_name]);

    }


    public function add_cart(Request $request, $id = false)
    {

        // dd($request->quantity);
        $product_id = $id;

        if (Auth::id()) {

            $user = Auth::user();


            $product = Product::find($id);

            $cart = new Carts;

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            if ($product->discount_price != null) {
                $cart->price = $product->discount_price;
            } else {
                $cart->price = $product->price;
            }

            $cart->quantity = $request->quantity;
            $cart->image = $product->image;
            $cart->product_id = $product_id;
            $cart->user_id = $user->id;

            if ($cart->save()) {

                return back();

            }


        } else {
            return back();
        }

    }

    public function showcart(Request $request)
    {
        $products_id = [];

        $user_id = Auth::id();

        if ($user_id) {

            $cart_details = Carts::where('user_id', $user_id)->get();
            foreach ($cart_details as $key => $product) {

                $products_id[] = $product->product_id;

            }

            if (!empty($products_id)) {

                foreach ($products_id as $key => $val) {
                    $products = Product::find($val)->get();
                }


            }

            return view('home.cart', ['cart_details' => $cart_details, 'products' => $products]);
        } else {
            return back();
        }
    }
    public function cartdlt(Request $request, $id = false)
    {


        $cart_delete = Carts::find($id);

        $cart_delete->delete();

        return redirect('/showcart')->with('success', 'Items form your cart has been succesfully deleted');



    }


    public function cash_order(Request $request)
    {

        $user_id = Auth::id();
        $order_details = Carts::where('user_id', $user_id)->get();


        foreach ($order_details as $key => $val) {

            $orders = new Order;

            $orders->name = $val->name;
            $orders->email = $val->email;

            $orders->phone = $val->phone;
            $orders->address = $val->address;
            $orders->product_title = $val->product_title;
            $orders->price = $val->price;
            $orders->quantity = $val->quantity;
            $orders->image = $val->image;
            $orders->product_id = $val->product_id;
            $orders->user_id = $user_id;
            $orders->payment_status = 'processing';
            $orders->delivery_status = 'cash on delevery';

            $orders->save();
            $cart_delete = Carts::find($val->id);

            $cart_delete->delete();

        }
        if ($orders->save()) {



            return back()->with('success', 'you have succesfully ordered');
        }




    }



   
}