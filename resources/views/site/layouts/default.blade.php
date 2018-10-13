<!DOCTYPE html>
<html lang="en">
	@include('site.layouts.partials.head')
	<body> 
		@include('site.layouts.partials.nav')
		
		@yield('content')

		@include('site.layouts.partials.footer')
		@include('site.layouts.partials.copyright')
		@include('site.layouts.partials.script')
	</body>
</html>