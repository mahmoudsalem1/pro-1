@extends('site.layouts.default')

@section('content')
@include('site.layouts.partials.slider')

<!-- Start About -->
<div class="about text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Welcome <span>{{ getSettings() }}</span></h2>
                <p>{{ getSettings('site_word_content') }}</p>
                <a href="{{route('site.page', 'about-us')}}">
                    <button class="btn">More</button>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- End About -->

<!-- Start Filter Product -->
<div class="owl-filter text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="demos">
                <div class="btn-filter-wrap">
                    <button class="btn-filter" data-filter=".*">All</button>
                    @foreach($categories as $cat)
                    <button class="btn-filter" data-filter=".slug-{{$cat->id}}">{{ $cat->name }}</button>
                    @endforeach
                </div>
                <div class="owl-carousel">
                    @foreach($categories as $cat)
                    @foreach($cat->FeaturedLimitedProducts() as $product)
                    <div class="item m-0 slug-{{ $cat->id }}"><!-- Apple -->
                        <div class="box">
                            <img src="{{$product->image_path }}" alt="" class="img-fluid">
                            <p>{{ str_limit(strip_tags($product->content), 150) }}</p>
                            <a href="{{ $product->url }}" class="btn">More</a>
                        </div>
                    </div>
                    @endforeach
                    @endforeach
                </div>
            </div>
        </div>    
        </div>
    </div>
</div>

<!-- End Filter Products -->

<!-- Start Owl Carousel -->
<div class="best-seller text-center">
    <div class="container">
        <h3>Best <span> Sellers</span></h3>
        <div class="row">
            <div class="wrapper">

                 @foreach($products as $product)
                <div class="box">
                    <img src="{{ $product->image_path }}" alt="" class="img-fluid">
                    <p>{{ str_limit(strip_tags($product->content), 150) }}</p>
                    <a href="{{ $product->url }}" class="btn">More</a>
                </div>
                @endforeach

               
            </div>
        </div>
    </div>
</div>

<!-- End Owl carousel -->
@endsection

