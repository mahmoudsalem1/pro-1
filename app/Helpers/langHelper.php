<?php
// Defind
use \App\Models\Lang as lang;

/**
* Return an array of all supported Locales
*
* @return array
*/
function getSupportedLocales(){
	return LaravelLocalization::getSupportedLocales();
}

/**
* Set and return current locale
*
* @param  string $locale	        Locale to set the App to (optional)
*
* @return string 			        Returns locale (if route has any) or null (if route does not have a locale)
*/
function setLocaleHelper($locale = null){
	return LaravelLocalization::setLocale($locale);
}

/**
* Returns current locale name
*
* @return string current locale name
*/
function getCurrentLocaleName(){
	return LaravelLocalization::getCurrentLocaleName();
}

/**
* Returns current locale direction
*
* @return string current locale direction
*/
function getCurrentDir(){
	return LaravelLocalization::getCurrentLocaleDirection();
}

/**
* Returns current locale
*
* @return string current locale
*/
function getCurrentLocale(){
	return LaravelLocalization::getCurrentLocale();
}

/**
* Returns current Lang ( it the Same Locale but it's important)
*
* @return string current lang
*/
function getCurrentLang(){
	return LaravelLocalization::getCurrentLocale();
}

/**** DB lang ***/
if(! function_exists('getCurrentLangFromDB')){
  function getCurrentLangFromDB()
  {
    $lang = lang::where('code', getCurrentLocale())->where('status', 1)->first();
    return $lang != null ? $lang : lang::where('status', 1)->first();
  }
}

if(! function_exists('getAllLangFromDB')){
  function getAllLangFromDB()
  {
    $lang = lang::where('status', 1)->get();
    return $lang;
  }
}

