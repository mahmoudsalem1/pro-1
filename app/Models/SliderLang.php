<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderLang extends Model
{
    protected $table = 'sliders_lang';
    protected $fillable = [
    	'slider_id', 'lang', 'title', 'status', 'content'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function slider()
    {
    	return $this->belongsTo('App\Models\Slider', 'slider_id');
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
