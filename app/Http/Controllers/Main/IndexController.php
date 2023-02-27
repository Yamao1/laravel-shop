<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('main.index');
    }

    public function filter(Request $request)
    {
//        dd($request);
//        $products = Product::whereHas('categories', function ($query) {
//            $query->where('title', 'Категория 1');
//        })->get();
//
        $products = Product::query()->with('categories')->whereHas('categories', function ($query) {
            $query->where('title', 'cat 5');
        })->get();

        return view('product.index',compact('products'));
    }
}
