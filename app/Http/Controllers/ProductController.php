<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // List all products
    public function index(Request $request)
    {
        $query = Product::query();

        // Search functionality
        if ($request->has('search')) {
            $query->where('product_id', 'like', "%{$request->search}%")
                  ->orWhere('name', 'like', "%{$request->search}%")
                  ->orWhere('description', 'like', "%{$request->search}%")
                  ->orWhere('price', 'like', "%{$request->search}%");
        }

        // Sorting functionality
        if ($request->has('sort_by')) {
            $query->orderBy($request->sort_by, $request->get('order', 'asc'));
        }

        $products = $query->paginate(10);
        return view('products.index', compact('products'));
    }

    // Show form to create a product
    public function create()
    {
        return view('products.create');
    }

    // Store a new product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|unique:products',
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Product::create(array_merge($validated, ['image' => $imagePath]));

        return redirect('/products')->with('success', 'Product created successfully.');
    }

    // Display a specific product
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Show form to edit a product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // Update a product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $product->update($validated);

        return redirect('/products')->with('success', 'Product updated successfully.');
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('success', 'Product deleted successfully.');
    }
};


