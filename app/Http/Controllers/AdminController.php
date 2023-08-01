<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use PDF;
use Dompdf\Dompdf;

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
        $category = Category::all();


        return view('admin.product', ['category' => $category]);

    }

    public function add_product(Request $request)
    {


        $request->validate([
            'title' => 'required|max:20|min:4',
            'description' => 'required|max:20|min:4',
            'category' => 'required',
            'quantity' => 'required',
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
    public function product_delete(Request $request, $id = false)
    {


        $delete = Product::find($id);

        $delete->delete();

        return back()->with('data_dlt', 'data has been deleted successfully of id=' . $id);
    }


    public function edit_product(Request $request, $id = false)
    {

        $details = Product::find($id);
        $category = Category::all();
        return view('admin.edit', ['details' => $details, 'category' => $category]);

    }

    public function products_edit(Request $request, $id = false)
    {


        $request->validate([
            'title' => 'required|max:20|min:4',
            'description' => 'required|max:20|min:4',
            'category' => 'required',
            'quantity' => 'required|max:20|min:4',
            'price' => 'required',
            'discount_price' => 'required',


        ]);

        $image = null;

        if ($request->file('image')) {
            $image = time() . '.' . $request->file('image')->extension();

            $request->file('image')->move(public_path('images'), $image);

        } else {

            $image = $request->image;
        }

        $id = $request->id;

        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;

        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->image = $image;

        if ($product->save()) {

            return back()->with('success', 'Edited successfully');

        }


    }

    public function view_orders(Request $request)
    {


        $orders = Order::all();


        return view('admin.order', ['orders' => $orders]);

    }


    public function delivered(Request $request, $id = false)
    {



        $order = Order::find($id);
        $order->update(['payment_status' => 'paid', 'delivery_status' => 'delivered']);

        return redirect('/view_orders');

    }

    public function pdf(Request $request, $id = false)
    {
        set_time_limit(120);

        $order = Order::find($id);

        // echo 'Current PHP version: ' . phpversion();
        // die;
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => false, 'chroot'  => public_path('images'),])->loadView('admin.order_detail', ['order' => $order]);
        // return view('admin.order_detail', ['order' => $order]);
        return $pdf->download('order_detail.pdf');

    }

    public function search(Request $request)
    {
        unset($_REQUEST['_token']);

        $search = $request->search;
        $orders = Order::where('name', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')->orWhere('address', 'like', '%' . $search . '%')->orWhere('price', 'like', '%' . $search . '%')->get();

        return view('admin.order', ['orders' => $orders]);


    }

}