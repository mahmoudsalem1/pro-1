<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\MainController;
use App\Models\Social;
use View;
use Auth;
class SocialController extends MainController
{
	  private $viewPath = 'admin.social.';
	  private $policy   = 'socials.';
	  public function __construct()
	  {
	    View::share('pageTitle', trans('admin.socials'));
	  }

	  public function index()
	  {
	      $socials = Social::all();
	      return $this->getView($this->viewPath . 'index', $this->policy . 'view', ['socials' => $socials], 'edit');
	  }

	  public function update(Request $request, Social $socials)
	  {
	    if(! Auth::user()->can($this->policy . 'update')){
	            return view(important_pages('403'));
	    }

	    foreach (array_except($request->toArray(), ['_token', 'submit']) as $name => $link) {
	        $social = $socials->where('name', $name)->firstOrFail();
	        $social->update(['link' => $link]);  
	      }
	    return redirect()->back()->withFlashMessage(trans('admin.updated', ['name' => trans('admin.social')]));
	  }
}
