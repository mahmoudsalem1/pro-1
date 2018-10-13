<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h4>contact US</h4>
                <ul class="list-unstyled">
                    <li>Address : {{ getSettings('site_address_fectory') }}</li>
                    <li>Phone :  {{ getSettings('site_phone') }}</li>
                </ul>
                <h4>Follow US</h4>
                <div class="icons">
                    <a href=""  target="_blank"  class="facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href=""  target="_blank"  class="instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3">
                <h4>Latest Products</h4>
                <ul class="list-unstyled">
                    @foreach(getProducts(5) as $pro)
                    <li><a href="{{ $pro->url }}" rel="noopener noreferrer">-  {{ $pro->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-3">
                <h4>Quick Links</h4>
                <ul class="list-unstyled">
                    <li><a href="{{ route('site.home') }}/" rel="noopener noreferrer">- Home</a></li>
                    <li><a href="{{ route('site.page', 'about-us') }}" rel="noopener noreferrer">- About US</a></li>
                    <li><a href="{{ route('site.contact.show') }}" rel="noopener noreferrer">- Contact US</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>