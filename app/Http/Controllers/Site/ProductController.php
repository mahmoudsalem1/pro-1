<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Brand;
class ProductController extends Controller
{
	private $_paginate = 9;
    public function getProduct($slug)
    {
    	$product = Product::where('slug', $slug)->where('status', 1)->firstOrFail();
    	return view('site.product.product', compact('product'));
    }

    public function getProducts()
    {
    	$products = Product::where('status', 1)->orderBy('featured', 'desc')->paginate($this->_paginate);
        $category = null;
    	return view('site.product.products', compact('products', 'category'));
    }

    public function getByCategories()
    {
        $cats = ProductCategory::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('site.product.categories', compact('cats'));
    }

    public function getProductByCategory($slug)
    {
        $category = ProductCategory::where('slug', $slug)->where('status', 1)->firstOrFail();
        $products = $category->products()->where('status', 1)->orderBy('created_at', 'desc')->paginate($this->_paginate);
        return view('site.product.products', compact('products', 'category'));
    }

    public function search(Request $request)
    {
        $word = $request->q;
        $products = Product::search($word, $this->_paginate);
        $category = null;
        return view('site.product.products', compact('products', 'category'));
    }
}
