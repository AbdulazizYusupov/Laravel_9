<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->paginate(10);
        return view('Category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Category.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'tr' => 'required',
        ]);

        Post::create($data);

        return redirect()->route('category');
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'tr' => 'required',
        ]);
        $category->update($data);
        return redirect()->route('category');
    }

    public function destroy(Request $request, Category $category)
    {
        $id = $request->id;
        $destroy = Category::findOrFail($id);
        $destroy->delete();
        return redirect()->route('category')->with('delete', 'deleted');
    }
}
