<div class="container" style="padding-top: 60px; padding-bottom: 60px;">
<div class="row">
    <div class="col-12">
        <div class="row">
            @if($products->count() > 0)
            @foreach($products as $product)
            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                <div class="single-product">
                    <div class="product-img">
                        <a href="product-details.html">
                            <img class="default-img" src="{{ asset('public/images/product/'.$product->image_path) }}" alt="{{ $product->name }}">
                            <img class="hover-img" src="{{ asset('public/images/product/'.$product->image_path) }}" alt="{{ $product->name }}">
                        </a>
                        <div class="button-head">
                            <div class="product-action">
                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                            </div>
                            <div class="product-action-2">
                                <a title="Add to cart" href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="product-details.html">{{ $product->name }}</a></h3>
                        <div class="product-price">
                            <span>R{{ $product->selling_price }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
                <h5>This Category Has no products available!</h5>
            @endif
        </div>
    </div>
</div>
</div>
