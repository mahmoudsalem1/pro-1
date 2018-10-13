<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageLang extends Model
{
    protected $table = 'pages_lang';
    protected $fillable = [
    	'page_id', 'lang', 'title', 'status', 'slug', 'content', 'description', 'keywords'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function page()
    {
    	return $this->belongsTo('App\Models\Page', 'page_id');
    }

    public function getModulesAttribute()
    {
    	return isset($this->page->modules) ? $this->page->modules : '';
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
