@extends('layouts.app')

@section('content')
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="cart-title mt-50">
                    <h2>Shopping Cart</h2>
                </div>

                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Cart::count() > 0)
                          @foreach (Cart::content() as $product)
                                  <tr>
                                      <td class="cart_product_img">
                                          <a href="{{ route('shop.show', $product->model->slug) }}"><img src="{{ ($product->model->img_path) }}" alt="{{ $product->model->name }}"></a>
                                      </td>
                                      <td class="cart_product_desc">
                                        <h5>{{ $product->model->name }}</h5>
                                      </td>
                                      <td class="price">
                                          <span>${{ $product->model->price }}</span>
                                      </td>
                                      <td class="qty">
                                          <div class="qty-btn d-flex">
                                              <p>Qty</p>
                                              <div class="quantity">
                                                <input size="35" type="number" id="eyes" name="eyes"
                                                 placeholder="Min: 1 "
                                                 min="1" max="100" data-id="{{ $product->rowId }}"
                                                 />
                                              </div>
                                          </div>
                                      </td>
                                  </tr>
                              @endforeach
                        </tbody>
                        @else
                        <tbody>
                          <tr>
                            <td>
                              <h3>No products in Cart!</h3>
                              <div class="spacer"></div>
                              <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
                              <div class="spacer"></div>
                            </td>
                          </tr>
                        </tbody>
                    @endif
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="cart-summary">
                    <h5>Cart Total</h5>
                    <ul class="summary-table">
                      <li><span>subtotal:</span> <span> {{ (Cart::subtotal()) }} <br></span></li>
                      <li><span>delivery:</span> <span> {{ (Cart::tax()) }} <br></span></li>
                      <li><span>total:</span> <span>    {{ (Cart::total()) }}</span></span></li>
                    </ul>
                    <div class="cart-btn mt-25">
                      <a href="{{route('checkout.index')}}" class="btn amado-btn w-100">Checkout</a>
                    </div>
                    <div class="cart-btn mt-50">
                      <a href="{{ route('shop.index') }}" class="btn amado-btn active">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
