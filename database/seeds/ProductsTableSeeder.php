<?php

use CodeShopping\Models\Category;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        factory(\CodeShopping\Models\Product::class, 30)
            ->create()
            ->each(function(\CodeShopping\Models\Product $product) use ($categories){
                $categoriesId = $categories->random()->id;
                $product->categories()->attach($categoriesId);
            });
    }
}
