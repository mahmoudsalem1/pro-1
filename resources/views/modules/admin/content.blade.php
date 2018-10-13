
<ul class="nav nav-tabs nav-justified">
  @foreach ($dbLangs as $key => $lang)
  <li class="nav-item">
    <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="{{ $lang->code . '-' . $num }}-tab" data-toggle="tab" href="#{{ $lang->code. '-' . $num }}" aria-controls="{{ $lang->code . '-' . $num }}" aria-expanded="{{ $key == 0 ? 'true' : 'false' }}">{{ $lang->name }}</a>
  </li>
  @endforeach
</ul>

<div class="tab-content px-1 pt-1">
  
  @foreach ($dbLangs as $key => $lang)
  <div role="tabpanel" class="tab-pane fade {{ $key == 0 ? 'active in' : '' }}" id="{{ $lang->code. '-' . $num  }}" aria-labelledby="{{ $lang->code . '-' . $num }}-tab" aria-expanded="{{ $key == 0 ? 'true' : 'false' }}">

    <div class="col-md-12">
      <div class="col-md-12">
        <div class="form-group">
         <label for="title">{{ trans('admin.title', ['name' => trans('admin.page', [], $lang->code)], $lang->code) }}</label>

         <input type="text" name="mod[{{$num}}][content][title][{{ $lang->code }}][]" 
         value="{{ $data == null ? '' : getDataContent($data, 'title', $lang->code) }}" class="form-control">

       </div>
     </div>

     <div class="col-md-12">
      <div class="form-group">
       <label for="title">{{ trans('admin.content', [], $lang->code) }}</label>

       <textarea class="form-control ckeditor editor-ajax" id="mod-content-{{ $lang->code . '-' . rand(0,99999888)}}" rows="5" name="mod[{{$num}}][content][desc][{{ $lang->code }}][]">{{ $data == null ? '' : getDataContent($data, 'desc', $lang->code) }}</textarea>

     </div>
   </div>
 </div>
</div>
@endforeach
</div>