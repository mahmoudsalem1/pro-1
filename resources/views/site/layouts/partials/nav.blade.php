<!-- Search Overlay -->
<div class="search">
    <button class="btn btn-close"><i class="fas fa-times"></i></button>
    <form action="{{ route('site.products.search') }}" method="get">
    <input type="text" class="form-control" name="q" value="{{ request()->get('q') }}" placeholder="What's On Your Mind ?">
    </form>
</div>
<!-- End Search Overlay -->

<!-- Start Navbar -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">

        <a class="navbar-brand" href="{{ route('site.home') }}">
            <img src="{{ asset('site/img/logo kma.png') }}"  alt="{{ getSettings() }}">
        </a>            

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fas fa-align-justify"></i></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.html">Home</a>
                </li>
                @foreach(getMenu() as $menu)
                <li class="nav-item">
                    <a class="nav-link {{ url()->full() == $menu->url ? 'active' : '' }}" href="{{ $menu->url }}" target="{{ $menu->target }}">
                        {{ $menu->name }}
                    </a>
                </li>
                @endforeach
                <li class="nav-item category">
                    <a class="nav-link" href="shop.html">Browse by Category</a>
                    <div class="category-items d-flex flex-row">
                        @foreach(getCategories() as $category)
                        <ul class="list-unstyled" style="width:18%">
                            <h4>{{ $category->name }}</h4>
                            <span>-------</span>   
                            @foreach(getCategories($category->id) as $cat)                         
                            <li><a href="#">{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item brand">
                    <a class="nav-link" href="brand.html">Browse by brand</a>
                    <div class="category-brand d-flex">
                        <ul class="list-unstyled">
                            <li><a href="">Apple</a></li>
                            <li><a href="">HP</a></li>
                            <li><a href="">Huawei</a></li>
                            <li><a href="">Infinix</a></li>
                            <li><a href="">Lenovo</a></li>
                        </ul>
                    </div>
                </li>
                <button class="btn btn-search"><i class="fas fa-search"></i> Search</button>  
            </ul>
        </div>
    </div>
</nav>

<!-- End Navbar -->