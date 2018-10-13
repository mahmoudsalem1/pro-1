<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\MainController;
use App\Http\Requests\Admin\ProductCategory as productReq;
use DataTables;
use Response;
use Auth;
use View;
use App\Models\ProductCategory as product;
use App\Models\ProductCategoryLang as productLang;

class ProductCategoryController extends MainController
{
    private $viewPath = 'admin.productCategory.';
    private $policy   = 'product-categories.';
    public function __construct()
    {
       View::share('pageTitle', trans('admin.products'));
    }

    public function index(Request $req)
 	{
 	   return $this->getView($this->viewPath . 'index', $this->policy . 'view');
 	}

    public function create()
    {
        $parents = product::langPluck()->prepend(trans('admin.selectSom'), '');
        return $this->getView($this->viewPath . 'create', $this->policy . 'create', ['product' => null, 'parents' => $parents], 'create');
    }

    public function edit($id)
    {
        $product = product::findOrFail($id);
        $parents = product::langPluck([$id])->prepend(trans('admin.selectSom'), '');
        return $this->getView($this->viewPath . 'edit', $this->policy . 'update', ['product' => $product, 'parents' => $parents], 'edit');
    }

    public function show($id)
    {
        $product = product::findOrFail($id);
        return $this->getView($this->viewPath . 'show', $this->policy . 'view', ['product' => $product], 'view');
    }

    public function store(productReq $request)
    {
        if(! Auth::user()->can($this->policy . 'create')){
            return view(important_products('403'));
        }

        $product = product::create([
            'status'  => $request->status,
            'parent_id'  => $request->parent_id,
            'featured'    => (boolean)$request->featured,
            'slug'    => $request->slug,
        ]);
        foreach (getAllLangFromDB() as $key => $lang){
            productLang::create([
            	'status'	  	  => $request->status,
                'title'       	  => $request->title[$lang->code],
                'product_category_id' => $product->id,
                'lang'        	  => $lang->code,
                'description' 	  => $request->description[$lang->code],
                'featured'    => (boolean)$request->featured,
                'keywords'    	  => $request->keywords[$lang->code],
            ]);
        }
        return redirect(route('product-categories.index'))->withFlashMessage(trans('admin.created', ['name' => trans('admin.product')]));
    }

    public function update($id, productReq $request)
    {
        if(! Auth::user()->can($this->policy . 'update')){
            return view(important_pages('403'));
        }
        $product = product::findOrFail($id);
        $product->update([
            'status'  => $request->status,
            'parent_id'  => $request->parent_id,
            'featured'    => (boolean)$request->featured,
            'slug'    => $request->slug,
        ]);
        foreach (getAllLangFromDB() as $key => $lang){
            productLang::where('product_category_id', $id)->where('lang', $lang->code)->update([
                'title'       => $request->title[$lang->code],
                'status'      => (boolean)$request->status,
                'featured'    => (boolean)$request->featured,
                'description' => $request->description[$lang->code],
                'keywords'    => $request->keywords[$lang->code],
            ]);
        }
        return redirect(route('product-categories.index'))->withFlashMessage(trans('admin.updated', ['name' => trans('admin.product')]));

    }

    public function destroy($id, Request $request)
    {
        if(! Auth::user()->can($this->policy . 'delete')){
            if($request->ajax()){
                return Response::json(important_pages('ajax.403'));
            }
            return view(important_products('403'));
        }

        product::findOrFail($id)->delete();
        $delMessage = trans('admin.deleted', ['name' => trans('admin.product')]);
        if($request->ajax()){
            return Response::json($delMessage);
        }
        return redirect(route('product-categories.index'))->withFlashMessage($delMessage);
    }

    /*
    * Ajax
    */
    public function AjaxLoad(product $data)
 	{
 	   $products = $data->all();
    	return Datatables::of($products)
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
            	return getAjaxAction($this->policy, $model, route('product-categories.show', $model->id), route('product-categories.edit', $model->id), route('product-categories.destroy', $model->id));
            })
            ->make(true);
 	}

    public function multiDelete(Request $request, product $data)
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
