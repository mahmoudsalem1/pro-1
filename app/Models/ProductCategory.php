<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
     protected $table = 'product_categories';
    protected $fillable = [
    	'slug', 'status', 'featured', 'parent_id'
    ];

    protected $casts = [
        'status' => 'boolean',
        'featured' => 'boolean',
    ];

    public function parent()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'parent_id');
    }

     public function children()
    {
        return $this->hasMany('App\Models\ProductCategory', 'parent_id');
    }

    public function productsLang()
    {
    	return $this->hasMany('App\Models\ProductCategoryLang', 'product_category_id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'product_category_id');
    }

    public function limitedProducts()
    {
        return $this->products()->orderBy('created_at', 'desc')->take(8)->get();
    }

    public function FeaturedLimitedProducts()
    {
        return $this->products()->where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
    }

    public function lang()
    {
    	return $this->productsLang()->where('lang', getCurrentLocale())->first();
    }

    public function langWith($lang)
    {
    	return $this->productsLang()->where('lang', $lang)->first();
    }

    public function getNameAttribute()
    {
        return isset($this->lang()->title) ? $this->lang()->title : '';
    }

    public function getShowAttribute()
    {
        return $this->attributes['status'] == 1 ? trans('admin.active') : trans('admin.inactive');
    }

    public static function langPluck($array = null)
    {
        $parents = self::join('product_categories_lang as withLang', 'withLang.product_category_id', '=', 'product_categories.id');
                    if($array != null){
                    $parents = $parents->whereNotIn('product_categories.id', $array);
                    }
                    $parents = $parents->where('withLang.lang', getCurrentLocale())
                    ->pluck('withLang.title', 'product_categories.id');
        return $parents;
    }

    public function getFullParentsAttribute()
    {
       $arrayx = $this->id . '.'. $this->parents;
       $array =  array_filter(array_reverse(explode('.', $arrayx)));
       return $array;
    }

    public function getParentsAttribute()
    {
        $path = $this->parent_id;
        if($this->parent_id != null){
            $path .=  '.' . $this->parent->parents;
         
        }
        return $path;
    }

        /**
    * Make Status boolean value
    *
    * @var $val
    * @return void
    */
    public function setStatusAttribute($val){
      $this->attributes['status'] = (boolean) $val;
    }

    public function setFeaturedAttribute($val){
      $this->attributes['featured'] = (boolean) $val;
    }
}
