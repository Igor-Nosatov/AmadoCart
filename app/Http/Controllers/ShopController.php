<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;


class ShopController extends Controller
{
  public function index()
  {
      $pagination = 6;
      $categories = Category::all();

      if (request()->category) {
          $products = Product::with('categories')->whereHas('categories', function ($query) {
              $query->where('slug', request()->category);
          });
          $categoryName = optional($categories->where('slug', request()->category)->first())->name;
      } else {
          $products = Product::where('featured', true);
          $categoryName = 'Featured';
      }

      if (request()->sort == 'low_high') {
          $products = $products->orderBy('price')->paginate($pagination);
      } elseif (request()->sort == 'high_low') {
          $products = $products->orderBy('price', 'desc')->paginate($pagination);
      } else {
          $products = $products->paginate($pagination);
      }

      return view('pages.shop')->with([
          'products' => $products,
          'categories' => $categories,
          'categoryName' => $categoryName,
      ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  string  $slug
   * @return \Illuminate\Http\Response
   */
  public function show($slug)
  {
      $product = Product::where('slug', $slug)->firstOrFail();
      $ShuffleRand = Product::where('slug', '!=', $slug)->ShuffleRand()->get();

      return view('pages.product-details')->with([
          'product' => $product,
          'ShuffleRand' => $ShuffleRand,
      ]);
  }
}
