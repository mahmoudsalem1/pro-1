 <li>  
                                <div class="product-box">
                                    <a href="{{ $product->url }}">{{ $product->name }}</a><br>
                                    <img src="{{ $product->image_path }}" alt="{{ $product->alt_photo }}" class="img-fluid">
                                    <p>{{ $product->price }} $</p>
                                    <!--<button class="btn"><i class="fas fa-shopping-cart"></i>Add To Cart</button>-->
                                </div>
                            </li>