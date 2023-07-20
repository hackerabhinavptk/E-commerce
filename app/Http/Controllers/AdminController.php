<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category(Request $request)
    {
        $category_list = Category::orderby('id', 'desc')->paginate(2);
        return view('admin.category', ['category_list' => $category_list]);

    }

    public function add_category(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:16',

        ]);
        // dd($request->category_name);
        Category::create($_REQUEST);


        return back()->with('success', 'Category added succesfully');

    }

    public function category_delete(Request $request, $id = false)
    {

        //  dd($id);
        $delete = Category::find($id);

        $delete->delete();

        return back()->with('data_dlt', 'data has been deleted successfully of id=' . $id);
    }

    public function view_product(Request $request)
    {
        $category=Category::all();
     

        return view('admin.product',['category'=>$category]);

    }

    public function add_product(Request $request)
    {


        $request->validate([
            'title' => 'required|max:20|min:4',
            'description' => 'required|max:20|min:4',
            'category' => 'required|max:50|min:4',
            'quantity' => 'required|max:20|min:4',
            'price' => 'required',
            'discount_price' => 'required',


            'image' => 'required|image|mimes:jpg,png,jpeg'

        ]);
        $image = time() . '.' . $request->file('image')->extension();

        $request->file('image')->move(public_path('images'), $image);

        $product = Product::create($_REQUEST);

        if ($product) {

            $product->image = $image;
            $product->save();

            $request->session()->flash('success', 'data submitted successfully');

        } else {
            $request->session()->flash('error', 'data not submitted successfully');
        }

        return back();

    }

    public function list_product(Request $request)
    {

        $list = Product::all();

        return view('admin.list', ['list' => $list]);


    }

}