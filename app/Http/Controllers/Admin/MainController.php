<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Response;
use App\User;
use Auth;

class MainController extends Controller
{ 
	public function getView($view, $policy, $array = null, $action = 'datatable')
	{
		$array['act'] = $action;
		$target_view = view(important_pages('403'));
		if(Auth::user()->can($policy)){
			$target_view = view($view, $array); 
		}
		return $target_view;
	}

}