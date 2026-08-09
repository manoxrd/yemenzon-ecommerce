<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Inertia\Inertia;

class TrashedProductController extends Controller
{
  public function index()
  {
    $products = Product::onlyTrashed()->with('category:id,name')->get();

    return Inertia::render('admin/products/Trash', [
      'products' => $products
    ]);
  }

  public function update(int $product_id)
  {
    Product::onlyTrashed()->findOrFail($product_id)->restore();

    return back();
  }

  public function destroy(int $product_id) {
    Product::onlyTrashed()->findOrFail($product_id)->forceDelete();

    return back();
  }
}
