@extends('site.layouts.default')
@section('meta')
{!! getPageMetaTags($page->name, $page->keys, $page->descrip, $page->image_path) !!}
@endsection
@section('content')
<div class="about text-right">
    <div class="container">
        <div class="row">
        	
        	@if($page->modules_array != []  || $page->modules_array != null)
        		@foreach($page->modules_array as $key => $modules)
        			@foreach($modules as $k => $module)
        				@if(view()->exists('modules.site.' . $k))
        					@include('modules.site.' . $k, ['mod' => $module])
        				@endif
        			@endforeach
        		@endforeach    
        	@endif
        </div>
    </div>
</div>
@endsection