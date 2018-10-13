<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageCatgory;

class PageController extends Controller
{
    public function index($slug)
    {
        $page = $this->slugHandling($slug);
    	return view('site.page.index', compact('page'));
    }

    public function category($cat, $slug)
    {
    	$category = PageCatgory::where('slug', $cat)->where('status', 1)->firstOrFail();
    	$page = Page::where('slug', $slug)->where('category_id', $category->id)->where('status', 1)->firstOrFail();
    	return view('site.page.index', compact('page'));
    }

    private function slugHandling($slug)
    {
        $array = array_filter(explode('/', $slug));
        $count = count($array);
        foreach($array as $k => $val){
            if(($k+1) != $count){
                $category = PageCatgory::where('slug', $val)->where('status', 1)->firstOrFail();
            }else{
                $page = Page::where('slug', $val)->where('status', 1)->firstOrFail();
            }
        }
        return $page;
        
    }
}
