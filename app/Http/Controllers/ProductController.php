<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $products = Product::where('is_active', true)
    ->get();

    
    // when($request->category, fn($query, $category) => $query->where('category_id', $category))->


    return Inertia::render('products/Index', [
      'products' => $products,
    ]);
  }

  public function show(Product $product)
  {
    return Inertia::render('products/Show', [
      'product' => $product,
    ]);
  }
}
