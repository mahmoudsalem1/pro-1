<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageCatgory extends Model
{
    protected $table = 'page_categories';
    protected $fillable = [
    	'slug', 'parent_id','status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function pagesLang()
    {
    	return $this->hasMany('App\Models\PageCatgoryLang', 'page_catgory_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\PageCatgory', 'parent_id');
    }

    public function parents()
    {
        return $this->hasMany('App\Models\PageCatgory', 'parent_id');
    }

    public function lang()
    {
    	return $this->pagesLang()->where('lang', getCurrentLocale())->first();
    }

    public function langWith($lang)
    {
    	return $this->pagesLang()->where('lang', $lang)->first();
    }

    public function getHasParentAttribute()
    {
        return $this->parents->count();
    }

    public function getPathAttribute()
    {
       $array =  array_filter(array_reverse(explode('.', $this->page_path)));
       $path = '';
       foreach($array as $v){
        $path .= '/'.$v;
       }
       return $path . '/';
    }

    public function getPagePathAttribute()
    {
        $path = $this->slug;
        if($this->parent_id != null){
            if(isset($this->parent)){
                $path .=  '.' . $this->parent->page_path;
            }
        }
        return $path;
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
        $parents = self::join('page_categories_lang as withLang', 'withLang.page_catgory_id', '=', 'page_categories.id');
                    if($array != null){
                    $parents = $parents->whereNotIn('page_categories.id', $array);
                    }
                    $parents = $parents->where('withLang.lang', getCurrentLocale())
                    ->pluck('withLang.title', 'page_categories.id');
        return $parents;
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
