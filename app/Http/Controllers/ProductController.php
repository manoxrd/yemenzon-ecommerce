<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        // $products = Product::when($request->category, fn($query, $category) => $query->where('category_id', $category))->get();

        // dd($request->category);

        $category = Category::where('name', $request->category)->first();

        $products = Product::where('is_active', true)->when($category?->id, fn ($query, $category) => $query->where('category_id', $category))->with('category')->get();

        $categories = Category::all();

        return Inertia::render('products/Index', [
            'products' => $products,
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    public function show(Product $product)
    {
        return Inertia::render('products/Show', [
            'product' => $product,
        ]);
    }
}
