<?php

namespace App\Http\Controllers;

use App\Models\Product; // Make sure to import the Product model
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve and return all products from the database
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data before creating a product
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer', // Add validation for quantity
        ]);

        // Create a new product using mass assignment
        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve a single product by its ID or return an error if not found
        return Product::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request before updating the product
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer', // Add validation for quantity
        ]);

        // Find the product by ID and update it
        $product = Product::findOrFail($id);
        $product->update($request->all());

        // Return the updated product
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete the product by its ID
        Product::destroy($id);

        // Return a success message
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
