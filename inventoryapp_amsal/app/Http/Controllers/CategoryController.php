<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $categories = Category::all();

        return view('category.category', compact('categories'));
    }
    public function create()
    {
        return view('category.createCategory');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect('/category')->with('success', 'Kategori baru berhasil ditambah!');
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.editCategory', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name
        ]);

        return redirect('/category')->with('success', 'Kategori berhasil diupdate!');
    }

       public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->books()->count() > 0) {
            return redirect('/category')->withErrors(['error' => 'Gagal! Kategori tidak bisa dihapus karena masih ada produk di dalamnya.']);
        }

        $category->delete();
        return redirect('/category')->with('success', 'Kategori berhasil dihapus!');
    }
}
