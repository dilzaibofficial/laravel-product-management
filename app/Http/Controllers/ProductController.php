<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
   // Method to show the create form
   public function create()
   {
       return view('products.create');
   }

   // Method to store the product in the database
   public function store(Request $request)
   {
       // Validate the data
       $request->validate([
           'name' => 'required|string|max:255',
           'description' => 'required|string',
           'price' => 'required|numeric',
           'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
       ]);

       // Upload the image
       $imageName = time() . '.' . $request->image->extension();
       $request->image->move(public_path('images'), $imageName);

       // Create and store product in the database
       Product::create([
           'name' => $request->name,
           'description' => $request->description,
           'price' => $request->price,
           'image' => $imageName,
       ]);

       // Redirect to product list page with success message
       return redirect()->route('products.index')->with('success', 'Product added successfully!');
   }

   // Method to display all products
   public function index()
   {
       $products = Product::all();
       return view('products.index', compact('products'));
   }
}
