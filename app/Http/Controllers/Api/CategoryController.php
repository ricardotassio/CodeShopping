<?php
namespace CodeShopping\Http\Controllers\Api;

use CodeShopping\Http\Controllers\Controller;
use CodeShopping\Http\Requests\Category\ProductRequest;
use CodeShopping\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }
    
    public function store(ProductRequest $request)
    {
        return Category::create($request->all());
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function update(ProductRequest $request, Category $category)
    {
        $category->fill($request->all());
        $category->save();
        return response([],204);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response([],204);
    }
}
