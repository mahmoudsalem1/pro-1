<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\MainController;
use View;
class SeoController extends MainController
{
	private $viewPath = 'admin.seo.';
    public function __construct()
    {
    	View::share('pageTitle', trans('admin.seo'));
    }
    public function showTagsForm()
    {
    	return view($this->viewPath . 'tags');
    }


    public function showSitemapForm()
    {
    	return view($this->viewPath . 'sitemap');
    }

    public function uploadSitemap(Request $request)
    {
    	$request->validate([
    		'file' => 'required|mimes:xml'
    	]);

    	$file = $request->file('file');
    	$destinationPath = public_path('/');
    	$name = 'sitemap.' . $file->getClientOriginalExtension();
    	$file->move($destinationPath, $name);
    	return redirect()->back()->withFlashMessage('admin.success');
    }

    // Ajax
    public function showTagsData(Request $request)
    {
    	if($request->ajax()){
    		$page = $request->page;
    		$data = $this->dealingWithData($page);
    		$result = view($this->viewPath . 'tag', compact('data'))->render();
    		return response()->json($result);
    	}
    	return abort(404);
    }



    // Helper functions
    private function dealingWithData($url)
    {
    	$result = false;

		$contents = $this->getUrlContents($url);

		if (isset($contents) && is_string($contents)) {
		    $title = null;
		    $metaTags = null;

		    preg_match('/<title>([^>]*)<\/title>/si', $contents, $match);

		    if (isset($match) && is_array($match) && count($match) > 0) {
		        $title = strip_tags($match[1]);
		    }

		    preg_match_all('/<[\s]*meta[\s]*name="?' . '([^>"]*)"?[\s]*' . 'content="?([^>"]*)"?[\s]*[\/]?[\s]*>/si', $contents, $match);

		    if (isset($match) && is_array($match) && count($match) == 3) {
		        $originals = $match[0];
		        $names = $match[1];
		        $values = $match[2];

		        if (count($originals) == count($names) && count($names) == count($values)) {
		            $metaTags = array();

		            for ($i = 0, $limiti = count($names); $i < $limiti; $i++) {
		                $metaTags[$names[$i]] = array(
		                    'html' => htmlentities($originals[$i]),
		                    'value' => $values[$i]
		                );
		            }
		        }
		    }

		    $result = array(
		        'title' => $title,
		        'metaTags' => $metaTags
		    );
		}
		return $result;
	}


	private function getUrlContents($url, $maximumRedirections = null, $currentRedirection = 0)
	 {
		$result = false;

		$contents = @file_get_contents($url);

		// Check if we need to go somewhere else

		if (isset($contents) && is_string($contents)) {
		    preg_match_all('/<[\s]*meta[\s]*http-equiv="?REFRESH"?' . '[\s]*content="?[0-9]*;[\s]*URL[\s]*=[\s]*([^>"]*)"?' . '[\s]*[\/]?[\s]*>/si', $contents, $match);

		    if (isset($match) && is_array($match) && count($match) == 2 && count($match[1]) == 1) {
		        if (!isset($maximumRedirections) || $currentRedirection < $maximumRedirections) {
		            return getUrlContents($match[1][0], $maximumRedirections, ++$currentRedirection);
		        }

		        $result = false;
		    } else {
		        $result = $contents;
		    }
		}

		return $contents;
    }
}
