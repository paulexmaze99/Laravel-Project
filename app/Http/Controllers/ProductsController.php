<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Product;

use Illuminate\Http\Request;
use PhpParser\Builder\Function_;

class ProductsController extends Controller
{
    public function create()
{
    # To create a new product we’ll need to present a dropdown of categories
    # that product can be associated with. To do this, we’ll need some category
    # data to pass to the view.
    # The following query will return an array of category names keyed by their id
    $categories = Category::pluck('name', 'id')->all();

    # Return a view to show our form, including the category data
    return view('products-create')->with('categories', $categories);
}
public function store(Request $request)
{


        $request->validate([
            'name' => 'required|unique:products|max:255',
        ]);

    $product = new Product();
    $product->name = $request->name;
    $product->category_id = $request->category_id;
    $product->save();

    # When done, redirect the user back and include a message we
    # can display on the page as confirmation
    return redirect('/products/create')->with(
        'message',
        'Your product ' . $request->name . ' was added'
    );


}
    public function showProductsByCategory($category = null){
      # This will return us a Collection of all the categories in the database
    $categories = Category::all();
    $products = null;
    if($category){
    $category_id = $categories->firstWhere('name', $category)->id;

    $products = product::all();

    # Now we can query for products matching this category
    $products = Product::where('category_id', $category_id)->get();
}
        return view('products')
        ->with(['products' => $products])
        ->with(['category' => $category])
        ->with(['categories' => $categories]);
    }
}
