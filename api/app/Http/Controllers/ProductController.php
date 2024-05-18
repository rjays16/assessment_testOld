<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function storeProduct(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'nullable|date',
            'status' => 'required|boolean',
        ]);

        // Create a new product using the validated data
        $product = Product::create($validatedData);

        // Return a response, e.g., the created product or a success message
        return response()->json($product, 201);
    }
}
