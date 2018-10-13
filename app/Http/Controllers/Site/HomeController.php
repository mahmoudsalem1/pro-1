<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
class HomeController extends Controller
{
    public function index()
    {
    	$categories = ProductCategory::where('status', 1)->where('featured', 1)->orderBy('created_at', 'desc')->take(5)->get();
    	$products   = Product::where('status', 1)->where('featured', 1)->orderBy('created_at', 'desc')->take(6)->get();
        return view('site.home.index', compact('categories', 'products'));
    }
}
