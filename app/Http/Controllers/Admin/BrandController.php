<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\MainController;
use App\Http\Requests\Admin\Brand as brandReq;
use DataTables;
use Response;
use Auth;
use View;
use App\Models\Brand as brand;
use App\Models\BrandLang as brandLang;


class BrandController extends MainController
{
    private $viewPath = 'admin.brand.';
    private $policy   = 'brands.';
    public function __construct()
    {
       View::share('pageTitle', trans('admin.brands'));
    }

    public function index(Request $req)
 	{
 	   return $this->getView($this->viewPath . 'index', $this->policy . 'view');
 	}

    public function create()
    {
        return $this->getView($this->viewPath . 'create', $this->policy . 'create', ['brand' => null], 'create');
    }

    public function edit($id)
    {
        $brand = brand::findOrFail($id);
        return $this->getView($this->viewPath . 'edit', $this->policy . 'update', ['brand' => $brand], 'edit');
    }

    public function show($id)
    {
        $brand = brand::findOrFail($id);
        return $this->getView($this->viewPath . 'show', $this->policy . 'view', ['brand' => $brand], 'view');
    }

    public function store(brandReq $request)
    {
        if(! Auth::user()->can($this->policy . 'create')){
            return view(important_brands('403'));
        }

        $brand = brand::create([
            'status'  => $request->status,
            'featured'=> $request->featured,
            'slug'    => $request->slug,
            'image'   => $request->image,
        ]);
        foreach (getAllLangFromDB() as $key => $lang){
            brandLang::create([
            	'status'	  => $request->status,
                'featured'    => $request->featured,
                'title'       => $request->title[$lang->code],
                'brand_id'    => $brand->id,
                'lang'        => $lang->code,
                'description' => $request->description[$lang->code],
                'keywords'    => $request->keywords[$lang->code],
            ]);
        }
        return redirect(route('brand.index'))->withFlashMessage(trans('admin.created', ['name' => trans('admin.brand')]));
    }

    public function update($id, brandReq $request)
    {
        if(! Auth::user()->can($this->policy . 'update')){
            return view(important_brands('403'));
        }

        $brand = brand::findOrFail($id);
        $brand->update([
            'status'  => $request->status,
            'featured'=> $request->featured,
            'image'   => $request->image,
            'slug'    => $request->slug,
        ]);
        foreach (getAllLangFromDB() as $key => $lang){
            brandLang::where('brand_id', $id)->where('lang', $lang->code)->update([
                'title'       => $request->title[$lang->code],
                'status'      => (boolean)$request->status,
                'featured'    => (boolean)$request->featured,
                'description' => $request->description[$lang->code],
                'keywords'    => $request->keywords[$lang->code],
            ]);
        }
        return redirect(route('brand.index'))->withFlashMessage(trans('admin.updated', ['name' => trans('admin.brand')]));

    }

    public function destroy($id, Request $request)
    {
        if(! Auth::user()->can($this->policy . 'delete')){
            if($request->ajax()){
                return Response::json(important_pages('ajax.403'));
            }
            return view(important_pages('403'));
        }

        brand::findOrFail($id)->delete();
        $delMessage = trans('admin.deleted', ['name' => trans('admin.brand')]);
        if($request->ajax()){
            return Response::json($delMessage);
        }
        return redirect(route('brand.index'))->withFlashMessage($delMessage);
    }

    /*
    * Ajax
    */
    public function AjaxLoad(brand $data)
 	{
 	   $brands = $data->all();
    	return Datatables::of($brands)
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
            	return getAjaxAction($this->policy, $model, route('brand.show', $model->id), route('brand.edit', $model->id), route('brand.destroy', $model->id));
            })
            ->make(true);
 	}

    public function multiDelete(Request $request, brand $data)
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
