<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'asc')->paginate(10);
        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'count' => 'required',
        ]);

        Product::create($data);

        return redirect()->route('product');
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'count' => 'required',
        ]);
        $product->update($data);
        return redirect()->route('product');
    }

    public function destroy(Request $request, Product $product)
    {
        $id = $request->id;
        $destroy = Product::findOrFail($id);
        $destroy->delete();
        return redirect()->route('product');
    }
}
