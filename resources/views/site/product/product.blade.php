@extends('site.layouts.default')
@section('meta')
{!! getPageMetaTags($product->name, $product->keys, $product->descrip, $product->image_path) !!}
@endsection
@section('content')
<!-- Start Details --> 
<div class="details text-center pt-5 pb-5">
    <div class="container">
        <div class="row">
        <div class="col-lg-8">
            <h2>{{ $product->name }}</h2>
            <p>{!! $product->content !!}</p>
        </div>
        <div class="col-lg-4">
            <img src="{{ $product->image_path }}" alt="{{ $product->alt_photo }}" title="{{ $product->name }}" style="width: 100%; max-height: 350px">
            </div>
        </div>
    </div>
</div>

<!-- End Details -->
@endsection