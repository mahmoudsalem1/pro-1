@extends('site.layouts.default', ['pageTitle' => trans('site.products')])
@section('style')
<!-- Style File Contact -->
<link rel="stylesheet" href="{{asset('site/css/products.css')}}">   
@endsection

@section('content')

<!-- Start Filter Products -->

<div class="filter text-center">
    <div class="container">
        <div class="main-filter">
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <button class="btn active" data-filter="all">جميع المنتجات</button>
                    @foreach($cats as $k => $cat)
                    <button class="btn" data-filter=".slug{{$cat->id}}">{{ $cat->name }}</button>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            @foreach($cats as $k => $cat)
            @foreach($cat->limitedProducts() as $key => $product)
            <div class="col-lg-3 mix slug{{ $cat->id }}">
                <div class="product-box">
                      <a href="{{ $product->url }}">
                         <img src="{{ $product->image_path }}" alt="{{ $product->alt_photo }}" class="img-fluid">
                    </a>
                </div>
            </div>
            @endforeach
            @endforeach

        </div>
        </div>
    </div>
</div>

<!-- End Filter Products -->

@endsection