<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\MainController;
use App\Http\Requests\Admin\Product as productReq;
use DataTables;
use Response;
use Auth;
use View;
use App\Models\Product as product;
use App\Models\ProductLang as productLang;
use App\Models\ProductCategoryLang as category;
use App\Models\ProductCategory as mainCategory;
use App\Models\BrandLang as brand;

class ProductController extends MainController
{
    private $viewPath = 'admin.product.';
    private $policy   = 'products.';
    public function __construct()
    {
       View::share('pageTitle', trans('admin.products'));
    }

    public function index(Request $req)
 	{
 	   return $this->getView($this->viewPath . 'index', $this->policy . 'view');
 	}

    public function create(category $cat)
    {
        $cats = $cat->where('lang', getCurrentLang())->pluck('title', 'product_category_id')->prepend(trans('admin.selectSom'), '');
        $brands = brand::where('lang', getCurrentLang())->pluck('title', 'brand_id')->prepend(trans('admin.selectSom'), '');
        return $this->getView($this->viewPath . 'create', $this->policy . 'create', ['product' => null, 'cats' => $cats, 'brands' => $brands], 'create');
    }

    public function edit($id, category $cat)
    {
        $product = product::findOrFail($id);
        $cats = $cat->where('lang', getCurrentLang())->pluck('title', 'product_category_id')->prepend(trans('admin.selectSom'), '');
        $brands = brand::where('lang', getCurrentLang())->pluck('title', 'brand_id')->prepend(trans('admin.selectSom'), '');

        return $this->getView($this->viewPath . 'edit', $this->policy . 'update', ['product' => $product, 'cats' => $cats, 'brands' => $brands], 'edit');
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
        $cat     = mainCategory::findOrFail($request->category_id);
        $product = product::create([
            'status'  => $request->status,
            'featured'=> $request->featured,
            'slug'    => $request->slug,
            'image'   => $request->image,
            'brand_id'=> $request->brand_id,
            'price'=> $request->price,
            'product_category_id' => $request->category_id
        ]);
        foreach (getAllLangFromDB() as $key => $lang){
            productLang::create([
            	'status'	  => $request->status,
                'featured'    => $request->featured,
                'title'       => $request->title[$lang->code],
                'content'     => $request->content[$lang->code],
                'product_id'  => $product->id,
                'lang'        => $lang->code,
                'description' => $request->description[$lang->code],
                'keywords'    => $request->keywords[$lang->code],
            ]);
        }
        $cats = $cat->full_parents != null ? $cat->full_parents : [];
        $product->categories()->sync($cats);
        return redirect(route('product.index'))->withFlashMessage(trans('admin.created', ['name' => trans('admin.product')]));
    }

    public function update($id, productReq $request)
    {
        if(! Auth::user()->can($this->policy . 'update')){
            return view(important_products('403'));
        }

        $product = product::findOrFail($id);
        $cat     = mainCategory::findOrFail($request->category_id);
        $product->update([
            'status'  => $request->status,
            'featured'=> $request->featured,
            'image'   => $request->image,
            'slug'    => $request->slug,
            'brand_id'=> $request->brand_id,
            'price'=> $request->price,
            'product_category_id' => $request->category_id
        ]);
        foreach (getAllLangFromDB() as $key => $lang){
            productLang::where('product_id', $id)->where('lang', $lang->code)->update([
                'title'       => $request->title[$lang->code],
                'status'      => (boolean)$request->status,
                'featured'    => (boolean)$request->featured,
                'content'     => $request->content[$lang->code],
                'description' => $request->description[$lang->code],
                'keywords'    => $request->keywords[$lang->code],
            ]);
        }
        $cats = $cat->full_parents != null ? $cat->full_parents : [];
        $product->categories()->sync($cats);
        return redirect(route('product.index'))->withFlashMessage(trans('admin.updated', ['name' => trans('admin.product')]));

    }

    public function destroy($id, Request $request)
    {
        if(! Auth::user()->can($this->policy . 'delete')){
            if($request->ajax()){
                return Response::json(important_pages('ajax.403'));
            }
            return view(important_pages('403'));
        }

        product::findOrFail($id)->delete();
        $delMessage = trans('admin.deleted', ['name' => trans('admin.product')]);
        if($request->ajax()){
            return Response::json($delMessage);
        }
        return redirect(route('product.index'))->withFlashMessage($delMessage);
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
            	return getAjaxAction($this->policy, $model, route('product.show', $model->id), route('product.edit', $model->id), route('product.destroy', $model->id));
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
