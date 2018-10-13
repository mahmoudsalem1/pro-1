<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\MainController;
use App\Models\Contact as contact;
use DataTables;
use Response;
use View;
use Auth;
class ContactController extends MainController
{
    private $viewPath = 'admin.contact.';
    private $policy   = 'contacts.';

    public function __construct()
    {
       View::share('pageTitle', trans('admin.contacts'));
    }

 	public function index(Request $req)
 	{
 	   return $this->getView($this->viewPath . 'index', $this->policy . 'view');
 	}

    public function show($id)
    {
        $message = contact::findOrFail($id);
        $message->update(['status' => 1]);

        return $this->getView($this->viewPath . 'show', $this->policy . 'view', ['message' => $message], 'view');
    }

    public function destroy($id, Request $request)
    {
        if(! Auth::user()->can($this->policy . 'delete')){
            if($request->ajax()){
                return Response::json(important_pages('ajax.403'));
            }
            return view(important_pages('403'));
        }

        contact::findOrFail($id)->delete();
        $delMessage = trans('admin.deleted', ['name' => trans('admin.contact')]);
        if($request->ajax()){
            return Response::json($delMessage);
        }
        return redirect(route('contact.index'))->withFlashMessage($delMessage);
    }

 	/*
 	* Ajax
 	*/
 	public function AjaxLoad(contact $data)
 	{
 	   $contacts = $data->all();
    	return DataTables::of($contacts)
           ->rawColumns(['action','select', 'status'])
           ->editColumn('select', function ($model) {
               return getSelectAjax($model);
            })

           ->editColumn('name', function ($model) {
              
                return $model->name;
            })

           ->editColumn('status', function ($model) {
              
                return getMsgStatus($model->show, $model->id);
            })
            
            ->editColumn('action', function ($model) {
            	return getAjaxAction($this->policy, $model, route('contact.show',$model->id), null, route('contact.destroy', $model->id));
            })
            ->make(true);
 	}

 	public function multiDelete(Request $request, contact $data)
    {
        if(! Auth::user()->can($this->policy . 'delete')){
            if($request->ajax()){
                return Response::json(important_pages('ajax.403'));
            }
            return view(important_pages('403'));
        }

        if($request->ajax()){
            $ids = $request->id;
            foreach ($ids as $id) {
               $find =  $data->find($id);
               if($find == null){
                continue;
               }
               $find->delete();
            }
            return Response::json('done');
        }
        return view('errors.404');
        
    }
}
