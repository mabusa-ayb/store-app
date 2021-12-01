<div class="container" style="padding-top: 60px; padding-bottom: 60px;">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="blog-single-main">
                <div class="row">
                    <div class="col-12">
                        <div class="image">
                            <img src="{{ asset('public/images/product/'.$data->image_path) }}" alt="{{ $data->name }}">
                        </div>
                        <div class="blog-detail">
                            <h4 class="blog-title">Description.</h4>
                            <hr>
                            <div class="content">
                                {!! $data->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="main-sidebar">
                <div class="single-widget category">
                    <h3 class="title">Product Details</h3>
                    <ul class="categor-list">
                        <li>{{ $data->name }}</a></li>
                        <li>R{{ $data->selling_price }}</a></li>
                        <li>Available Quantity - {{ $data->stock }}</a></li>
                    </ul>
                    <br>

                    <form action="{{ route('add') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $data->id }}" id="id" name="id">
                        <input type="hidden" value="{{ $data->name }}" id="name" name="name">
                        <input type="hidden" value="{{ $data->selling_price }}" id="price" name="selling_price">
                        <input type="hidden" value="{{ $data->stock }}" id="inventory" name="inventory">
                        <input type="hidden" value="{{ $data->tag }}" id="tag" name="tag">
                        <input type="hidden" value="{{ $data->image_path }}" id="img" name="image_path">
                        Quantity
                        <br>
                        <input style="width: 70px;" type="number" id="quantity" value="1" name="quantity" min="1" max="{{ $data->stock }}">
                        <button type="submit" href="#" class="buy btn-sm btn-success"><i class="fa fa-shopping-bag"></i> Add to Cart</button>
                    </form>

                </div>
                <div class="single-widget side-tags">
                    <h3 class="title">Tag</h3>
                    <ul class="tag">
                        <li><a href="#">{{ $data->tag }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
