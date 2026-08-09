<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Inertia\Inertia;

class CategoryController extends Controller
{
  public function index()
  {
    return Inertia::render('admin/categories/Index', [
      'categories' => Category::get()
    ]);
  }

  public function store(CategoryRequest $request)
  {
    Category::create($request->validated());
    return back();
  }

  public function update(CategoryRequest $request, Category $category)
  {
    $category->update($request->validated());
    return back();
  }

  public function destroy(Category $category)
  {
    $category->delete();
    return back();
  }
}
