<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Http\Requests\Product\ProductRequest;
use CodeShopping\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return Product::paginate();
    }
    
    public function store(ProductRequest $request)
    {
        return Product::create($request->all());
    }
    
    public function show(Product $product)
    {
        return $product;
    }
    
    public function update(ProductRequest $request, Product $product)
    {
        $product->fill($request->all());
        $product->save();
        return response([],204);
    }
    
    public function destroy(Product $product)
    {
        $product->delete();
        return response([],204);
    }
}
