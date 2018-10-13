<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandLang extends Model
{
    protected $table = 'brands_lang';
    protected $fillable = [
    	'brand_id', 'lang', 'title', 'status', 'featured', 'slug', 'description', 'keywords'
    ];

    protected $casts = [
        'status' => 'boolean',
        'featured' => 'boolean',
    ];

    public function brand()
    {
    	return $this->belongsTo('App\Models\Brand', 'brand_id');
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
