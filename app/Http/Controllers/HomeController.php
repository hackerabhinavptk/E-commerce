<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

        return view('home.userpage');

    }
    public function hh(Request $request, $id=false){

        dd('hlo');
               
                $request->validate([
                    'title' => 'required|max:20|min:4',
                    'description' => 'required|max:20|min:4',
                    'category' => 'required',
                    'quantity' => 'required|max:20|min:4',
                    'price' => 'required',
                    'discount_price' => 'required',
        
        
                    'image' => 'required|image|mimes:jpg,png,jpeg'
        
                ]);
                
                $image = time() . '.' . $request->file('image')->extension();
        
                $request->file('image')->move(public_path('images'), $image);
                
        
                $id = $request->id;
        
                $product = Product::find($id);
        
                $product->title = $request->title;
                $product->description = $request->description;
        
                $product->category = $request->category;
                $product->quantity = $request->quantity;
                $product->price = $request->price;
                $product->discount_price = $request->discount_price;
                $product->image = $request->image;
        
                if ($product->save()) {
        
                    return redirect('admin.list');
        
                }
        
        
            }
        
}