<?php
/**
* Get value of the admin input 
*
* @return string value of input
*/
if(! function_exists('checkVar')){
	function checkVar($method, $var, $lang, $name, $old)
	{
		if($method == 'create'){
			$return = null;
		}elseif ($method == 'edit') {
			$return = $var->langWith($lang)->$name;
			$return = old($old, $return);
		}else{
			$return = null;
		}
		return $return;
	}
}

/**
* Get alt or image value
*
* @return string image value (alt or image)
*/
if(! function_exists('getImageValue')){
	function getImageValue($value, $type, $lang = null)
	{
		$return = null;
		if($type == 'image'){
			if($value != null){
				$return = $value->photo;
				$return = old('image.0.image', $return);
			}
		}else{
			if($value != null){
				$return = $value->getAltPhotoAttribute($lang);
				$return = old('image.0.title.'.$lang, $return);
			}
		}
		return $return;
	}
}

/**
* Get Date Content (modules)
*
* @return string content value
*/
if(! function_exists('getDataContent')){
	function getDataContent($data, $for, $lang)
	{
		return $data[$for][$lang][0];
	}
}