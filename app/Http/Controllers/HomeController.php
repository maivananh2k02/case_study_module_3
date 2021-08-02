<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::where('status_category','1')->get();
        $brand = Brand::where('status_brand','1')->get();
        $product=Product::where('status','1')->get();
        return view('pages.home',compact('category','brand','product'));
    }
}
