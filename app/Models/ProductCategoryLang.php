<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategoryLang extends Model
{
    protected $table = 'product_categories_lang';
    protected $fillable = [
    	'product_category_id', 'featured', 'lang', 'title', 'status', 'description', 'keywords'
    ];

    protected $casts = [
        'status' => 'boolean',
        'featured' => 'boolean',
    ];

    public function product()
    {
    	return $this->belongsTo('App\Models\ProductCategory', 'product_category_id');
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
