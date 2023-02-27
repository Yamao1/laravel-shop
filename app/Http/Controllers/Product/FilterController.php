<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function __invoke(Request $request)
    {
        $category = $request->input('category_id');
        $products = Product::whereHas('categories', function ($query) use ($category) {
            $query->where('title', $category);
        })->with('categories')->get();

        $categories = Category::all();

        return view('product.index', compact('products', 'categories'));
    }
}
