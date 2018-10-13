<?php
// Defines
use \App\Models\Setting as setting;
use \App\Models\Contact as contact;
use \App\Models\Product as product;
use \App\Models\ProductCategory as productCategory;
use \App\Models\Page as page;
use \App\Models\Menu as menu;
use \App\Models\Slider as slider;


/**
* Get website settings from database
*
* @return string setting
*/
if(! function_exists('getSettings')){
	function getSettings($settingName = 'title', $original = false){
	   $setting = setting::where('lang', getCurrentLocale())->where('name', $settingName)->first();
	   return $setting == null ? $settingName : ($original ? $setting->value : $setting->fulter_value);
	}
}

/**
* Check if the given value is exists in the given table or not
*
* @return string value
*/
if(! function_exists('checkCount')){
	function checkCount($table, $value, $field = 'slug'){
	   $count = \DB::table($table)->where($field, $value)->count();
	   $value  = $count == 0 ? $value : $value . '-'. ($count + 1);
	   return $value;
	}
}

/**
* Get count to the given table (can put one condition)
*
* @return integer counter
*/
if(! function_exists('getCount')){
	function getCount($table, $con = null, $val = null){
		$q = \DB::table($table);
		$q = $con != null ? $q->where($con, $val) : $q;
	   return $q->count();
	}
}

/**
* Get unread contacts from database
*
* @return object data contact
*/
if(! function_exists('getUnreadContacts')){
	function getUnreadContacts($limit = 15){
	   return contact::where('status', 0)->orderBy('created_at', 'desc')->take($limit)->get();
	}
}

/**
* Get Products with limit [ use for menu but it can help in meny places ]
*
* @return object data Product
*/
if(! function_exists('getProducts')){
	function getProducts($limit = 40)
	{
		return product::where('status', 1)->orderBy('created_at', 'desc')->take($limit)->get();		
	}
}

/**
* Get Pages with limit [ use for menu but it can help in meny places ]
*
* @return object data Page
*/
if(! function_exists('getPages')){
	function getPages($limit = 40)
	{
		return page::orderBy('created_at', 'desc')->take($limit)->get();		
	}
}

/**
* Get Website Menu where is active
* 
* @return Object data menu 
*/
if(! function_exists('getMenu')){
	function getMenu()
	{
		return menu::where('status', 1)->whereNull('parent_id')->orderBy('ordering', 'asc')->get();
	}
}

/**
* Get Website Slider where is active
* 
* @return Object data menu 
*/
if(! function_exists('getSlider')){
	function getSlider()
	{
		return slider::where('status', 1)->get();
	}
}

/**
* Get Product Categoies
* 
* @return Object Product Categories
*/
if(! function_exists('getCategories')){
	function getCategories($id = null, $limit = 5)
	{
		$cats = productCategory::whereNull('parent_id')->where('featured', 1)->where('status', 1)->orderBy('created_at', 'desc')->take($limit)->get();
		if($id != null){
			$cats = productCategory::where('parent_id', $id)->where('featured', 1)->where('status', 1)->orderBy('created_at', 'desc')->take($limit)->get();
		}
		return $cats;
	}
}