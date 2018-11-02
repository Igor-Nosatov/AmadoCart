@extends('layouts.app')

@section('content')

<div class="products-catagories-area clearfix">
    <div class="amado-pro-catagory clearfix">
        <!-- Single Catagory -->
        @foreach($products as $product)
        <div class="single-products-catagory clearfix">
            <a href="{{ route('shop.index') }}">
                <img src="{{asset($product->img_path)}}" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    <p>{{$product->price}}</p>
                    <h4>{{$product->name}}</h4>
                </div>
            </a>
        </div>
       @endforeach
    </div>
</div>
@endsection
