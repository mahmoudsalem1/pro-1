<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $fillable = [
    	'image', 'modules', 'status', 'views', 'slug', 'category_id'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function pagesLang()
    {
    	return $this->hasMany('App\Models\PageLang', 'page_id');
    }

    public function lang()
    {
    	return $this->pagesLang()->where('lang', getCurrentLocale())->first();
    }

    public function langWith($lang)
    {
    	return $this->pagesLang()->where('lang', $lang)->first();
    }

    public function category()
    {
        return $this->belongsTo('App\Models\PageCatgory', 'category_id');
    }

    public function getPhotoArrayAttribute()
    {
        return json_decode($this->attributes['image']);
    }

    public function getModulesArrayAttribute()
    {
        return json_decode($this->attributes['modules'], true);
    }


    public function getPhotoAttribute()
    {
        $image = $this->photo_array;
        $photo = '';
        if($image != null && $image != [] && isset($image[0]) && isset($image[0]->image)){
            $photo = $image[0]->image;
        }
        return $photo;
    }

    public function getImagePathAttribute()
    {
        $photo = $this->photo;
        return $photo == null ? '' : url($photo);
    }

    public function getAltPhotoAttribute($key = null)
    {
        $key = $key == null ? getCurrentLocale() : $key;
        $image = $this->photo_array;
        $alt = $this->name;
        if($image != null && $image != [] && isset($image[0]) && isset($image[0]->title->$key)){
            $alt = $image[0]->title->$key;
        }
        return $alt;
    }

    public function getCategorySlugAttribute()
    {
        return isset($this->category->path) ? $this->category->path : '#';
    }

    public function getNameAttribute()
    {
        return isset($this->lang()->title) ? $this->lang()->title : '';
    }

    public function getContentAttribute()
    {
        return isset($this->lang()->content) ? $this->lang()->content : '';
    }

    public function getKeysAttribute()
    {
        return isset($this->lang()->keywords) ? strip_tags($this->lang()->keywords) : getSettings('site_keys');
    }

    public function getDescripAttribute()
    {
        return isset($this->lang()->description) ? strip_tags($this->lang()->description) : getSettings('site_desc');
    }

    public function getUrlAttribute()
    {
        return isset($this->path) ? route('site.page',$this->path) : '#';
    }

    public function getPathAttribute()
    {
        if($this->category_id != null){
            return $this->category_slug . $this->slug;
        }
        return isset($this->slug) ? $this->slug : '#';
    }

    public function getShowAttribute()
    {
        return $this->attributes['status'] == 1 ? trans('admin.active') : trans('admin.inactive');
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

    public function setImageAttribute($val)
    {
        $this->attributes['image'] = json_encode($val);
    }

    public function setModulesAttribute($val)
    {
        $this->attributes['modules'] = json_encode($val);
    }
}
