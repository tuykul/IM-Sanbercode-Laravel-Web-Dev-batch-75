<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();

        return view('product.product', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.createProduct', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Maksimal 2MB
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'description' => 'required|string',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/images/products'), $imageName);

        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $imageName,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        return redirect('/product')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show($id)
    {
        return view('product.show', compact('id'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('product.editProduct', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'description' => 'required|string',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $oldImagePath = public_path('assets/images/products/' . $product->image);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/images/products'), $imageName);

            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;

        $product->save();

        return redirect('/product')->with('success', 'Data produk berhasil diupdate!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $imagePath = public_path('assets/images/products/' . $product->image);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $product->delete();

        return redirect('/product')->with('success', 'Produk berhasil dihapus!');
    }
}
