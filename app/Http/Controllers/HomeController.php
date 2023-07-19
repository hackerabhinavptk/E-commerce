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
}