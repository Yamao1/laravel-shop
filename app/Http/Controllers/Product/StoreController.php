<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\CategoryProduct;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $categories = $data['category_id'];
        unset($data['category_id']);

       $product =  Product::firstOrCreate($data);
        $product->categories()->attach($categories);

        return redirect()->route('product.index');
    }
}
