@extends('layouts.app')


@section('content')
<div class="shop_sidebar_area">
            <div class="widget catagory mb-50">
                <h6 class="widget-title mb-30">Categories</h6>
                <div class="catagories-menu">
                    <ul>
                       @foreach($categories as $category)
                        <li><a href="{{route('shop.index', ['category'=>$category->slug]) }}">{{$category->name}}</a></li>
                       @endforeach

                    </ul>
                </div>
            </div>
            <div class="widget price mb-50">
                <div class="widget-desc">
                      <h6 class="widget-title mb-10">Price</h6> <br>
                      <pre>  <a class="range-price" href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'low_high']) }}">$min-$$max </a></pre><br>
                      <pre><a class="range-price" href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'high_low']) }}">$$max-$min </a></pre>
                </div>
            </div>
        </div>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">


                <div class="row">

                  @forelse ($products as $product)
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper" style="border-top:1px solid #dfe6e9;border-bottom:1px solid #dfe6e9;">
                            <!-- Product Image -->
                            <div class="product-img">
                                <a href="{{ route('shop.show', $product->slug) }}">
                                  <img src="{{($product->img_path) }}" alt="product">
                                </a>
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">$ {{ $product->price }}</p>
                                      <a href="{{ route('shop.show', $product->slug) }}">
                                        <h5>{{ $product->name }}</h5>
                                      </a>
                                </div>
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-right">
                                    <div class="cart">
                                      <form class="cart clearfix" action="{{ route('cart.store') }}" method="POST">
                                      {{ csrf_field() }}
                                         <input type="hidden" name="id" value="{{ $product->id }}">
                                         <input type="hidden" name="name" value="{{ $product->name }}">
                                         <input type="hidden" name="price" value="{{ $product->price }}">
                                         <button type="submit" name="addtocart"  class="btn amado-btn"><img src="{{ asset('img/core-img/cart.png')}}" alt=""></button>
                                     </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">
                          <div style="text-align: left">No items found</div>
                        </div>
                    </div>
                    @endforelse
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Pagination -->
                        <nav aria-label="navigation">
                            <ul class="pagination justify-content-end mt-50">
                                <li class="page-item">{{ $products->appends(request()->input())->links() }}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
@endsection
