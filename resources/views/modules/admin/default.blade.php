 <div class="sort-scroll-element" id="mod-{{$num}}"> 
  <div id="heading{{ $num }}"  class="card-header">
    <span class="delete-mod" data-id="{{ $num }}">
      <span>
        <i class="fa fa-times"></i>
      </span>
    </span>
    <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#accordion{{ $num }}" aria-expanded="false" aria-controls="accordion{{ $num }}" class="card-title lead collapsed">
      {{ trans('modules.'.$km) }}
    </a>

    <span class="sort-scroll-button-up">
      <i class="fa fa-arrow-up"></i>
    </span>
    <span class="sort-scroll-button-down">
      <i class="fa fa-arrow-down"></i>
    </span>
    
  </div>
  <div id="accordion{{ $num }}" role="tabpanel" aria-labelledby="heading{{ $num }}" class="card-collapse collapse" aria-expanded="true">
    <div class="card-body">
      <div class="card-block">
        @include('modules.admin.'.$km, ['num' => $num, 'data' => $data])
      </div>
    </div>
  </div>
</div>