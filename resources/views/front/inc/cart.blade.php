<!-- Shopping Cart -->
<div class="shopping-cart section">
    @include('front.inc.alert')
    @if($cartCollection->count() > 0)
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Shopping Summery -->
                <table class="table shopping-summery">
                    <thead>
                    <tr class="main-hading">
                        <th>PRODUCT</th>
                        <th>NAME</th>
                        <th class="text-center">UNIT PRICE</th>
                        <th class="text-center">QUANTITY</th>
                        <th class="text-center">TOTAL</th>
                        <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartCollection as $item)
                    <tr>
                        <td class="image" data-title="No"><img src="images/cart1.jpg" alt="#"></td>
                        <td class="product-des" data-title="Description">
                            <p class="product-name"><a href="#">{{ $item->name }}</a></p>
                            <p class="product-des">{{ $item->tag }}</p>
                        </td>
                        <td class="price" data-title="Price"><span>R{{ $item->price }} </span></td>
                        <td class="qty" data-title="Qty"><!-- Input Order -->
                            <div class="input-group">
                                <div class="button minus">
                                    <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                        <i class="ti-minus"></i>
                                    </button>
                                </div>
                                <input type="text" name="quant[1]" class="input-number" data-min="1" data-max="{{ $item->inventory }}" value="{{ $item->quantity }}">
                                <div class="button plus">
                                    <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                        <i class="ti-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <!--/ End Input Order -->
                        </td>
                        <td class="total-amount" data-title="Total"><span>R{{ \Cart::get($item->id)->getPriceSum() }}</span></td>
                        <td class="action" data-title="Remove"><a href="#"><i class="ti-trash remove-icon"></i></a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <!--/ End Shopping Summery -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-12">
                            <div class="left">
                                <div class="coupon">
                                    <form action="{{ url('clear') }}" method="POST">
                                        @csrf
                                        <button class="btn">Clear Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7 col-12">
                            <div class="right">
                                <ul>
                                    <li>Cart Subtotal<span>R{{ \Cart::getTotal() }}</span></li>
                                    <li>Shipping<span>R100</span></li>
                                    <li class="last">You Pay<span>R{{ \Cart::getTotal() + 100 }}</span></li>
                                </ul>
                                <div class="button5">
                                    <a href="{{ url('checkout') }}" class="btn">Checkout</a>
                                    <a href="{{ url('online-store') }}" class="btn">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12">
                <!-- Start Newsletter Inner -->
                <div class="inner">
                    <h4>No Products Found in Shopping Cart.</h4>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
<!-- /End Shopping Cart -->

