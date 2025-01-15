<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        # Create a new category
       // $newcategory = new Category();
        //$newcategory->name = 'health';
       // $newcategory->save();

        # Query for all the categories and output them as an array
       // dump(Category::all()->toArray());

         # Create a new product associated with the above category
       // $newproduct = new Product();
       // $newproduct->name = 'Band-Aids';
       // $newproduct->category_id = $newcategory->id;
       // $newproduct->save();

         # Demonstrate how we can access the category to product relationship
       // dump($newproduct->category->name);

        # Query for all the products and output them as an array
        //dump(Product::all()->toArray());
        $productsByCategory = [
            'health' => [
                'Band-Aids',
                'Johnson’s Baby Powder',
                'Tylenol'
            ],
            'tech' => [
                'GoPro Action Camera',
                'FitBit Fitness Watch',
                'Nintendo Switch'
            ],
            'books' => [
                'The Martian',
                'The Great Gatsby',
                'Joy Luck Club'
            ]
        ];

        foreach($productsByCategory as $categoryName => $products) {
            $newCategory = new Category();
            $newCategory->name = $categoryName;
            $newCategory->save();
        
            foreach($products as $product) {
                $newProduct = new Product();
                $newProduct->name = $product;
                $newProduct->category()->associate($newCategory);
                $newProduct->save();
            }
        }

           dump(Category::all()->toArray());

         dump(Product::all()->toArray());
    }
}
