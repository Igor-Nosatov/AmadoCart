@extends('layouts.app')


@section('content')
<div class="single-product-area section-padding-100 clearfix">
          <div class="container-fluid">

              <div class="row">
                  <div class="col-12">
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb mt-50">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item"><a href="#">Furniture</a></li>
                              <li class="breadcrumb-item"><a href="#">Chairs</a></li>
                              <li class="breadcrumb-item active" aria-current="page">white modern chair</li>
                          </ol>
                      </nav>
                  </div>
              </div>

              <div class="row">
                  <div class="col-12 col-lg-7">
                      <div class="single_product_thumb">
                          <div id="product_details_slider" class="carousel slide" data-ride="carousel">

                              <div class="carousel-inner">
                                  <div class="carousel-item active">
                                      <a class="gallery_img" href="/{{($product->img_path) }}">
                                          <img class="d-block w-100" src="/{{($product->img_path) }}" alt="First slide">
                                      </a>
                                  </div>
                                  <div class="carousel-item">
                                      <a class="gallery_img" href="/{{($product->img_path) }}">
                                          <img class="d-block w-100" src="/{{($product->img_path) }}" alt="Second slide">
                                      </a>
                                  </div>
                                  <div class="carousel-item">
                                      <a class="gallery_img" href="/{{($product->img_path) }}">
                                          <img class="d-block w-100" src="/{{($product->img_path) }}" alt="Third slide">
                                      </a>
                                  </div>
                                  <div class="carousel-item">
                                      <a class="gallery_img" href="/{{($product->img_path) }}">
                                          <img class="d-block w-100" src="/{{($product->img_path) }}" alt="Fourth slide">

                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-12 col-lg-5">
                      <div class="single_product_desc">
                          <!-- Product Meta Data -->
                          <div class="product-meta-data">
                              <div class="line"></div>
                              <p class="product-price">${{$product->price}}</p>
                              <a href="product-details.html">
                                  <h6>{{$product->name}}</h6>
                              </a>
                              <!-- Ratings & Review -->
                              <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                  <div class="ratings">
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                  </div>
                                  <div class="review">
                                      <a href="#">Write A Review</a>
                                  </div>
                              </div>
                              <!-- Avaiable -->
                              <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                          </div>

                          <div class="short_overview my-5">
                              <p>{{$product->description}}</p>
                          </div>


                          <form class="cart clearfix" action="{{ route('cart.store') }}" method="POST">
                          {{ csrf_field() }}
                             <input type="hidden" name="id" value="{{ $product->id }}">
                             <input type="hidden" name="name" value="{{ $product->name }}">
                             <input type="hidden" name="price" value="{{ $product->price }}">
                             <button type="submit" name="addtocart"  class="btn amado-btn">Add to cart</button>
                         </form>

                      </div>
                  </div>
              </div>
          </div>
      </div>
@endsection
