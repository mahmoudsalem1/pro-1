<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if(View::hasSection('meta'))
        @yield('meta')
    @else
        @php $backup = trans('site.home'); @endphp
        @php $title  = isset($pageTitle) ? $pageTitle : $backup; @endphp
      {!!  getPageMetaTags($title) !!}
    @endif
        <!-- Logo Title Link -->
    <link rel="shortcut icon" href="{{asset('site/img/logo kma.png')}}">
    <!-- FontAwesome Link -->
    <link rel="stylesheet" href="{{asset('site/css/fontawesome-all.min.css')}}">
    <!-- Bootstrap 4 Link -->
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">
    <!-- Owl Carousel Link -->
    <link rel="stylesheet" href="{{asset('site/css/owl.carousel.min.css')}}">
    <!-- Owl Carousel Link -->
    <link rel="stylesheet" href="{{asset('site/css/owl.theme.default.min.css')}}">
    <!-- Slick Plugin Slider Link -->
    <link rel="stylesheet" href="{{asset('site/css/slick.css')}}">
    <!-- Slick Plugin Slider Theme Link -->
    <link rel="stylesheet" href="{{asset('site/css/slick-theme.css')}}">
    <!-- Main Style File Link -->
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">
    <!-- Poppins Font Link-->
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> 
    {!! getSettings('header') !!}
    @yield('style')
</head>

