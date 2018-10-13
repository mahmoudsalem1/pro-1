<!-- Start Slider -->
<div class="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators flex-column">
          @foreach(getSlider() as $key => $slider)
          <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
          @endforeach
        </ol>
        <div class="carousel-inner">
          @foreach(getSlider() as $key => $slider)
            <div class="carousel-item  {{ $key == 0 ? 'active' : '' }}">
              <img class="d-block img-fluid" src="{{ url($slider->photo) }}" alt="">
                <div class="content">
                    <h1>{{ $slider->name }}</h1>
                    <p>{{ $slider->content }}</p>
                </div>
            </div>
          @endforeach
        </div>
    </div>
</div>

<!-- End Slider -->
