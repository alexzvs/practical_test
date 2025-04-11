<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Ensure you import the Category model

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve and return all categories from the database
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data before creating a category
        $request->validate([
            'name' => 'required|string|unique:categories', // Ensure name is unique
        ]);

        // Create a new category using mass assignment
        return Category::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve a single category by its ID or return an error if not found
        return Category::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request before updating the category
        $request->validate([
            'name' => 'required|string', // Validate name as required and string
        ]);

        // Find the category by ID and update it
        $category = Category::findOrFail($id);
        $category->update($request->all());

        // Return the updated category
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete the category by its ID
        Category::destroy($id);

        // Return a success message
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
