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
    public function index()
    {
        $products = Product::where('is_active', true)->get();

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
