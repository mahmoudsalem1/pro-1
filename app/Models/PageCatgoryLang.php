<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageCatgoryLang extends Model
{
    protected $table = 'page_categories_lang';
    protected $fillable = [
    	'page_catgory_id', 'lang', 'title', 'status', 'description', 'keywords'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function page()
    {
    	return $this->belongsTo('App\Models\PageCatgory', 'page_catgory_id');
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
}
