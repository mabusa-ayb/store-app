<!-- Start Product Area -->
<div class="product-area section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Our Collection</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-info">
                    <div class="nav-main">
                        <!-- Tab Nav -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @foreach($categories as $category)
                            <li class="nav-item"><a class="nav-link {{ ($category->id == '13') ? 'active':'' }}" data-toggle="tab" href="#{{ $category->id }}" role="tab">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                        <!--/ End Tab Nav -->
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <!-- Start Single Tab -->
                        @foreach($categories as $category)
                        <div class="tab-pane fade show {{ ($category->id == '13') ? 'active':'' }}" id="{{ $category->id }}" role="tabpanel">
                            <?php
                            $catProducts = App\Products::where('category_id',$category->id)->get();
                            ?>
                            @if($catProducts->count() > 0)
                            <div class="tab-single">
                                <div class="row">

                                        @foreach($catProducts as $product)
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="{{ url('item/'.$product->id) }}">
                                                        <img class="default-img" src="{{ asset('public/images/product/'.$product->image_path) }}" alt="{{ $product->name }}">
                                                        <img class="hover-img" src="{{ asset('public/images/product/'.$product->image_path) }}" alt="{{ $product->name }}">

                                                        @if($product->tag != "")
                                                        <span class="new">{{ $product->tag }}</span>
                                                        @endif

                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a title="Quick View" href="{{ url('item/'.$product->id) }}"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="{{ url('item/'.$product->id) }}">{{ $product->name }}</a></h3>
                                                    <div class="product-price">
                                                        <span>R{{ $product->selling_price }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                </div>
                            </div>
                                @elseif($catProducts->count() == 0)
                                    <section class="shop-newsletter section">
                                        <div class="container">
                                            <div class="inner-top">
                                                <div class="row">
                                                    <div class="col-lg-8 offset-lg-2 col-12">
                                                        <!-- Start Newsletter Inner -->
                                                        <div class="inner">
                                                            <h4>No products available in this category</h4>
                                                        </div>
                                                        <!-- End Newsletter Inner -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                @endif
                        </div>
                        @endforeach
                        <!--/ End Single Tab -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product Area -->
