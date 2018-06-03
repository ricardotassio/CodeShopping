<?php

namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Http\Requests\Product\ProductRequest;
use CodeShopping\Http\Resources\ProductResource;
use CodeShopping\Models\Product;

class ProductController extends Controller
{
    public function index()
    {   $products = Product::paginate(10);
        return ProductResource::collection($products);
    }
    
    public function store(ProductRequest $request)
    {
        return Product::create($request->all());
    }
    
    public function show(Product $product)
    {
        return new ProductResource($product);
    }
    
    public function update(ProductRequest $request, Product $product)
    {
        $product->fill($request->all());
        $product->save();
        return new ProductResource($product);
    }
    
    public function destroy(Product $product)
    {
        $product->delete();
        return response([],204);
    }
}
