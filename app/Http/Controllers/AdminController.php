<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function view_category(Request $request)
    {
        $category_list = Category::orderby('id','desc')->paginate(2);
        return view('admin.category',['category_list'=>$category_list]);

    }

    public function add_category(Request $request)
    {

        // dd($request->category_name);
        Category::create($_REQUEST);


        return back()->with('success', 'Category added succesfully');

    }
    
    public function category_delete(Request $request, $id=false){

//  dd($id);
$delete=Category::find($id);

$delete->delete();

return back()->with('data_dlt' ,'data has been deleted successfully of id='.$id);
    }
}