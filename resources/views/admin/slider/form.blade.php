<div class="col-md-7">
  <hr>
  <h4><i class="fa fa-bookmark"></i> {{ trans('admin.shared_values') }}</h4>

<div class="col-md-12">
 <div class="form-group">
   <label for="icon">
    {{ trans('admin.image') }}
    <a href="#file-manger-section">
      {{ trans('admin.choose_file') }}
    </a>
  </label>
  <div class="input-group">
   <span class="input-group-btn">
     <span id="meta-image" style="color: #FFF" class="btn btn-primary">
      {{ trans('admin.show_alt') }}
    </span>
  </span>
  {!! Form::text('image[0][image]', getImageValue($slider, 'image'), 
  array('class'=>'form-control', 'id' => '')) !!}
</div>

@if($slider != null)
<img style="margin-top:15px;max-width: 150px;max-height:150px;" src="{{ $slider->image_path }}">
@endif


</div>
<div class="meta-image-content" style="display: none;">
  @foreach ($dbLangs as $key => $lang)
  <div class="form-group">
   <label for="icon">{{ trans('admin.alt', ['name' => $lang->name]) }}</label>
   <div class="input-group">
     {!! Form::text('image[0][title]['.$lang->code.']',getImageValue($slider, 'title', $lang->code), 
     array('class'=>'form-control')) !!}
   </div>
 </div>
 @endforeach
</div>
</div>

<div class="col-md-12">
  <div class="form-group">
   <label for="status">{{ trans('admin.status') }}</label>

   <input type="checkbox" class="checkbtnC" name="status" @if($act == 'edit') @if($slider->status == 1) checked="checked" @endif @else checked="checked"  @endif />

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
       <label for="title">{{ trans('admin.title', ['name' => trans('admin.page', [], $lang->code)], $lang->code) }}</label>

       {!! Form::text('title['.$lang->code.']', 
       checkVar($act, $slider, $lang->code, 'title','title.'.$lang->code), 
       array('class'=>'form-control slugable', 'data-slug' => $lang->code)) !!}
       @if ($errors->has('title.'.$lang->code))
       <span class="help-block">
        <strong>{{ $errors->first('title.'.$lang->code) }}</strong>
      </span>
      @endif
    </div>
  </div>

   <div class="col-md-12" style="">
    <div class="form-group">
     <label for="title">{{ trans('admin.content', [], $lang->code) }}</label>

     {!! Form::textarea('content['.$lang->code.']', 
     checkVar($act, $slider, $lang->code, 'content','content.'.$lang->code), 
     array('class'=>'form-control')) !!}
     @if ($errors->has('content.'.$lang->code))
     <span class="help-block">
      <strong>{{ $errors->first('content.'.$lang->code) }}</strong>
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
   <a href="{{ route('slider.index') }}" class="btn btn-danger">
    <i class="fa fa-times"></i> {{ trans('admin.cancel') }}
  </a>
</div>
</div>