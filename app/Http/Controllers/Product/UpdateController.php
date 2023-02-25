<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {

        $data = $request->validated();
        $xx = $data['category_id'];
//        dd($xx);
        unset($data['category_id']);

        $product->update($data);
        $product->categories()->sync($xx);
        return view('product.show', compact("product"));
    }
}
