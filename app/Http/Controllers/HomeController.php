<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\User;
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

        $products=Product::paginate(3);

        return view('home.userpage',['products'=>$products]);

    }

    public function product_details(Request $request, $id=false){

 $detail = Product::find($id);
 $category_name=Category::find($detail->category);
 return view('home.product_detail',['detail'=>$detail,'category_name'=>$category_name]);

    }
   
}