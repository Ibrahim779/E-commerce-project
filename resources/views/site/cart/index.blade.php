@extends('layouts.site')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url({{asset('assets/site/images/bg_1.jpg')}});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                    <h1 class="mb-0 bread">My Cart</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($cartItems as $cartItem)
                                <tr class="text-center">
                                    <td class="product-remove">
                                        <form method="post" action="{{route('cart.destroy', $cartItem->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <span class="ion-ios-close"></span>
                                            </button>

                                        </form>

                                    </td>

                                    <td class="image-prod">
                                        <a href="{{route('products.show', @$cartItem->product->id)}}">
                                            <div
                                                class="img" style="background-image:url({{url('storage/'.@$cartItem->product->image->url)}});">
                                            </div>
                                        </a>
                                    </td>

                                    <td class="product-name">
                                        <a href="{{route('products.show', @$cartItem->product->id)}}">
                                            <h3>{{@$cartItem->product->name}}</h3>
                                        </a>
                                        {{--                                    <p>{{$_wishlist->product->description}}</p>--}}

                                    </td>
                                    <td class="price">
                                        @if(@$cartItem->product->discount)
                                            <span style="text-decoration: line-through;">{{@$cartItem->product->price}} EGY</span>  <span style="color: #ffbe08 ">{{@$cartItem->product->discount_price}} EGY</span>
                                        @else
                                            <span style="color: #ffbe08 ">{{@$cartItem->product->price}} EGY</span>
                                        @endif
                                        <span style="color: #bbb;">for {{@$cartItem->product->quantity}}</span>
                                    </td>

                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                                        </div>
                                    </td>

                                    <td class="total">$4.90</td>
                                </tr><!-- END TR-->
                            @empty
                                <tr class="text-center">
                                    <td></td>
                                    <td>
                                        Your Cart Is Empty
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Coupon Code</h3>
                        <p>Enter your coupon code if you have one</p>
                        <form action="#" class="info">
                            <div class="form-group">
                                <label for="">Coupon code</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                        </form>
                    </div>
                    <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Estimate shipping and tax</h3>
                        <p>Enter your destination to get a shipping estimate</p>
                        <form action="#" class="info">
                            <div class="form-group">
                                <label for="">Country</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="country">State/Province</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="country">Zip/Postal Code</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                        </form>
                    </div>
                    <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimate</a></p>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>$20.60</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>$0.00</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>$3.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>$17.60</span>
                        </p>
                    </div>
                    <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
