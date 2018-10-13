@extends('site.layouts.default', ['pageTitle' => trans('site.products')])

@section('content')

<div class="shop-products">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
              @include('site.layouts.snippt.sidebar', ['category' => $category])
            </div>
            <div class="col-lg-9">
                <div class="tab-content" id="v-pills-tab-Content">
                    <div class="" >
                        <ul class="list-unstyled">
                            @forelse($products as $product)
                                @include('site.layouts.snippt.product', ['product' => $product])
                            @empty
                        <div class="col-lg-12 alert alert-warning text-center">
                            {{ trans('site.nodata') }}
                        </div>
                        @endforelse
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

