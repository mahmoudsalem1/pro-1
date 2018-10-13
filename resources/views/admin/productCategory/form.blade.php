<div class="col-md-7">
  <hr>
  <h4><i class="fa fa-bookmark"></i> {{ trans('admin.shared_values') }}</h4>

  <div class="col-md-12">
    <div class="form-group">
     <label for="title">{{ trans('admin.slug') }}</label>

     {!! Form::text('slug',null,array('class'=>'form-control', 'id' => 'slug-'. getCurrentLang())) !!}
     @if ($errors->has('slug'))
     <span class="help-block">
      <strong>{{ $errors->first('slug') }}</strong>
    </span>
    @endif
  </div>
</div>

 <div class="col-md-12">
        <div class="form-group">
          <label for="parent">{{ trans('admin.parent') }}</label>
          {!! Form::select("parent_id", $parents, null,
          ['class' => 'form-control',
          ]) !!}
          @if ($errors->has('parent_id'))
          <span class="help-block">
              <strong>{{ $errors->first('parent_id') }}</strong>
          </span>
          @endif
        </div>
      </div>

<div class="col-md-12">
  <div class="form-group">
   <label for="featured">{{ trans('admin.featured') }}</label>
   <input type="checkbox" class="checkbtnC" name="featured" @if($act == 'edit') @if($product->featured == 1) checked="checked" @endif @else checked="checked"  @endif />
 </div>
</div>

<div class="col-md-12">
  <div class="form-group">
   <label for="status">{{ trans('admin.status') }}</label>

   <input type="checkbox" class="checkbtnC" name="status" @if($act == 'edit') @if($product->status == 1) checked="checked" @endif @else checked="checked"  @endif />

 </div>
</div>
</div>

<div class="col-xs-5">
  <ul class="nav nav-tabs nav-justified">
    @foreach ($dbLangs as $key => $lang)
    <li class="nav-item">
      <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="{{ $lang->code }}-tab" data-toggle="tab" href="#{{ $lang->code }}" aria-controls="{{ $lang->code }}" aria-expanded="{{ $key == 0 ? 'true' : 'false' }}">{{ $lang->name }}</a>
    </li>
    @endforeach
  </ul>

  <div class="tab-content px-1 pt-1">

    @foreach ($dbLangs as $key => $lang)
    <div role="tabpanel" class="tab-pane fade {{ $key == 0 ? 'active in' : '' }}" id="{{ $lang->code  }}" aria-labelledby="{{ $lang->code }}-tab" aria-expanded="{{ $key == 0 ? 'true' : 'false' }}">
     <div class="col-md-12">
      <div class="form-group">
       <label for="title">{{ trans('admin.title', ['name' => trans('admin.product', [], $lang->code)], $lang->code) }}</label>

       {!! Form::text('title['.$lang->code.']', 
       checkVar($act, $product, $lang->code, 'title','title.'.$lang->code), 
       array('class'=>'form-control slugable', 'data-slug' => $lang->code)) !!}
       @if ($errors->has('title.'.$lang->code))
       <span class="help-block">
        <strong>{{ $errors->first('title.'.$lang->code) }}</strong>
      </span>
      @endif
    </div>
  </div>

  <div class="col-md-12" style="display: none;">
    <div class="form-group">
     <label for="title">{{ trans('admin.content', [], $lang->code) }}</label>

     {!! Form::textarea('content['.$lang->code.']', 
     checkVar($act, $product, $lang->code, 'content','content.'.$lang->code), 
     array('class'=>'form-control ckeditor')) !!}
     @if ($errors->has('content.'.$lang->code))
     <span class="help-block">
      <strong>{{ $errors->first('content.'.$lang->code) }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="col-md-12">
  <div class="form-group">
   <label for="title">{{ trans('admin.seo_desc', [], $lang->code) }} 
  </label>

  {!! Form::textarea('description['.$lang->code.']', 
  checkVar($act, $product, $lang->code, 'description','description.'.$lang->code), 
  array(
  'class'=>'form-control', 
  'id' => 'description'. $lang->code,
  'maxlength' => 155)
  ) !!}
  @if ($errors->has('description.'.$lang->code))
  <span class="help-block">
    <strong>{{ $errors->first('description.'.$lang->code) }}</strong>
  </span>
  @endif
</div>
</div>

<div class="col-md-12">
  <div class="form-group">
   <label for="title">{{ trans('admin.seo_keys', [], $lang->code) }} 
    <!--<small style="cursor: pointer;color:#8e1d26" onclick="tranferKeywords('content[{{$lang->code}}]', '{{$lang->code}}')">{{ trans('admin.pickFrom') }}</small>-->
  </label>
  {!! Form::textarea('keywords['.$lang->code.']', 
  checkVar($act, $product, $lang->code, 'keywords','keywords.'.$lang->code), 
  array(
  'class'=>'form-control',
  'id' => 'keywords'. $lang->code)
  ) !!}
  @if ($errors->has('keywords.'.$lang->code))
  <span class="help-block">
    <strong>{{ $errors->first('keywords.'.$lang->code) }}</strong>
  </span>
  @endif
</div>
</div>

</div>
@endforeach
</div>
</div>

<div class="col-md-12">
  <hr>
  <div class="clear">
    <button type="submit" class="btn btn-primary">
     <i class="icon-check2"></i> {{ trans('admin.save') }}
   </button>
   <a href="{{ route('product-categories.index') }}" class="btn btn-danger">
    <i class="fa fa-times"></i> {{ trans('admin.cancel') }}
  </a>
</div>
</div>