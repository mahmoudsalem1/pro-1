<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\MainController;
use App\Http\Requests\Admin\Slider as sliderReq;
use DataTables;
use Response;
use Auth;
use View;
use App\Models\Slider as slider;
use App\Models\SliderLang as sliderLang;

class SliderController extends MainController
{
    private $viewPath = 'admin.slider.';
    private $policy   = 'sliders.';
    public function __construct()
    {
       View::share('pageTitle', trans('admin.sliders'));
    }

    public function index(Request $req)
 	{
 	   return $this->getView($this->viewPath . 'index', $this->policy . 'view');
 	}

    public function create()
    {
        return $this->getView($this->viewPath . 'create', $this->policy . 'create', ['slider' => null], 'create');
    }

    public function edit($id)
    {
        $slider = slider::findOrFail($id);
        return $this->getView($this->viewPath . 'edit', $this->policy . 'update', ['slider' => $slider], 'edit');
    }

    public function show($id)
    {
        $slider = slider::findOrFail($id);
        return $this->getView($this->viewPath . 'show', $this->policy . 'view', ['slider' => $slider], 'view');
    }

    public function store(sliderReq $request)
    {
        if(! Auth::user()->can($this->policy . 'create')){
            return view(important_sliders('403'));
        }

        $slider = slider::create([
            'status'  => $request->status,
            'image'   => $request->image
        ]);
        foreach (getAllLangFromDB() as $key => $lang){
            sliderLang::create([
            	'status'	  => $request->status,
                'title'       => $request->title[$lang->code],
                'content'       => $request->content[$lang->code],
                'slider_id'   => $slider->id,
                'lang'        => $lang->code,
            ]);
        }
        return redirect(route('slider.index'))->withFlashMessage(trans('admin.created', ['name' => trans('admin.slider')]));
    }

    public function update($id, sliderReq $request)
    {
        if(! Auth::user()->can($this->policy . 'update')){
            return view(important_sliders('403'));
        }

        $slider = slider::findOrFail($id);
        $slider->update([
            'status'  => $request->status,
            'image'   => $request->image,
        ]);
        foreach (getAllLangFromDB() as $key => $lang){
            sliderLang::where('slider_id', $id)->where('lang', $lang->code)->update([
                'title'       => $request->title[$lang->code],
                'content'     => $request->content[$lang->code],
                'status'      => (boolean)$request->status,
            ]);
        }
        return redirect(route('slider.index'))->withFlashMessage(trans('admin.updated', ['name' => trans('admin.slider')]));

    }

    public function destroy($id, Request $request)
    {
        if(! Auth::user()->can($this->policy . 'delete')){
            if($request->ajax()){
                return Response::json(important_sliders('ajax.403'));
            }
            return view(important_sliders('403'));
        }

        slider::findOrFail($id)->delete();
        $delMessage = trans('admin.deleted', ['name' => trans('admin.slider')]);
        if($request->ajax()){
            return Response::json($delMessage);
        }
        return redirect(route('slider.index'))->withFlashMessage($delMessage);
    }

    /*
    * Ajax
    */
    public function AjaxLoad(slider $data)
 	{
 	   $sliders = $data->all();
    	return Datatables::of($sliders)
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
            	return getAjaxAction($this->policy, $model, route('slider.show', $model->id), route('slider.edit', $model->id), route('slider.destroy', $model->id));
            })
            ->make(true);
 	}

    public function multiDelete(Request $request, slider $data)
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
