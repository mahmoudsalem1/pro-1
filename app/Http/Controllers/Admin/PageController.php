<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\MainController;
use App\Http\Requests\Admin\Page as pageReq;
use DataTables;
use Response;
use Auth;
use View;
use App\Models\Page as page;
use App\Models\PageLang as pageLang;
use App\Models\PageCatgoryLang as category;

class PageController extends MainController
{
    private $viewPath = 'admin.page.';
    private $policy   = 'pages.';
    public function __construct()
    {
       View::share('pageTitle', trans('admin.pages'));
    }

    public function index(Request $req)
 	{
 	   return $this->getView($this->viewPath . 'index', $this->policy . 'view');
 	}

    public function create(category $cat)
    {
        $cats = $cat->where('lang', getCurrentLang())->pluck('title', 'page_catgory_id')->prepend(trans('admin.selectSom'), '');
        return $this->getView($this->viewPath . 'create', $this->policy . 'create', ['page' => null, 'cats' => $cats], 'create');
    }

    public function edit($id, category $cat)
    {
        $page = page::findOrFail($id);
        $cats = $cat->where('lang', getCurrentLang())->pluck('title', 'page_catgory_id')->prepend(trans('admin.selectSom'), '');
        return $this->getView($this->viewPath . 'edit', $this->policy . 'update', ['page' => $page, 'cats' => $cats], 'edit');
    }

    public function show($id)
    {
        $page = page::findOrFail($id);
        return $this->getView($this->viewPath . 'show', $this->policy . 'view', ['page' => $page], 'view');
    }

    public function store(pageReq $request)
    {
        if(! Auth::user()->can($this->policy . 'create')){
            return view(important_pages('403'));
        }

        $array = [];

        if($request->mod != null){
            foreach ($request->mod as $key => $value) {
                $array[] = $value;
            }
        }

        $page = page::create([
            'status'  => $request->status,
            'modules' => $array,
            'slug'    => $request->slug,
            'image'   => $request->image,
            'category_id' => $request->category_id
        ]);
        foreach (getAllLangFromDB() as $key => $lang){
            pageLang::create([
            	'status'	  => $request->status,
                'title'       => $request->title[$lang->code],
                'page_id' 	  => $page->id,
                'lang'        => $lang->code,
                'description' => $request->description[$lang->code],
                'keywords'    => $request->keywords[$lang->code],
            ]);
        }
        return redirect(route('page.index'))->withFlashMessage(trans('admin.created', ['name' => trans('admin.page')]));
    }

    public function update($id, pageReq $request)
    {
        if(! Auth::user()->can($this->policy . 'update')){
            return view(important_pages('403'));
        }


        $array = [];

        if($request->mod != null){
            foreach ($request->mod as $key => $value) {
                $array[] = $value;
            }
        }
        $page = page::findOrFail($id);
        $page->update([
            'status'  => $request->status,
            'image'   => $request->image,
            'slug'    => $request->slug,
            'modules' => $array,
            'category_id' => $request->category_id
        ]);
        foreach (getAllLangFromDB() as $key => $lang){
            pageLang::where('page_id', $id)->where('lang', $lang->code)->update([
                'title'       => $request->title[$lang->code],
                'status'      => (boolean)$request->status,
                'description' => $request->description[$lang->code],
                'keywords'    => $request->keywords[$lang->code],
            ]);
        }
        return redirect(route('page.index'))->withFlashMessage(trans('admin.updated', ['name' => trans('admin.page')]));

    }

    public function destroy($id, Request $request)
    {
        if(! Auth::user()->can($this->policy . 'delete')){
            if($request->ajax()){
                return Response::json(important_pages('ajax.403'));
            }
            return view(important_pages('403'));
        }

        page::findOrFail($id)->delete();
        $delMessage = trans('admin.deleted', ['name' => trans('admin.page')]);
        if($request->ajax()){
            return Response::json($delMessage);
        }
        return redirect(route('page.index'))->withFlashMessage($delMessage);
    }

    /*
    * Ajax
    */
    public function AjaxLoad(page $data)
 	{
 	   $pages = $data->all();
    	return Datatables::of($pages)
           ->rawColumns(['action','select', 'status'])
           ->editColumn('select', function ($model) {
               return getSelectAjax($model);
            })

           ->editColumn('title', function ($model) {
              
                return $model->name;
            })

           ->editColumn('status', function ($model) {
              
                return getStatus($model->show);
            })
            
            ->editColumn('action', function ($model) {
            	return getAjaxAction($this->policy, $model, route('page.show', $model->id), route('page.edit', $model->id), route('page.destroy', $model->id))  . ' ' . getLinkTag($model->url, '<i class="fa fa-link"></i>', ['class="btn btn-warning"', 'target="_blank"']);
            })
            ->make(true);
 	}

    public function multiDelete(Request $request, page $data)
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

 	public function getModule(Request $request)
    {
        $mod    = $request->mod;
        $data   = null;
        $num    = str_random(6) . rand(0,9999);
        $result = view('modules.admin.'. $mod, compact('data', 'mod', 'num'))->render();
        return Response::json($result);
    } 
}
