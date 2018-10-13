<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $fillable = [
    	'image', 'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function slidersLang()
    {
    	return $this->hasMany('App\Models\SliderLang', 'slider_id');
    }

    public function lang()
    {
    	return $this->slidersLang()->where('lang', getCurrentLocale())->first();
    }

    public function langWith($lang)
    {
    	return $this->slidersLang()->where('lang', $lang)->first();
    }

    public function getNameAttribute()
    {
        return isset($this->lang()->title) ? $this->lang()->title : '';
    }

    public function getImagePathAttribute()
    {
        $photo = $this->photo;
        return $photo == null ? '' : url($photo);
    }

    public function getPhotoArrayAttribute()
    {
        return json_decode($this->attributes['image']);
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

    public function getContentAttribute()
    {
        return isset($this->lang()->content) ? str_limit($this->lang()->content, 85) : '';
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
}
