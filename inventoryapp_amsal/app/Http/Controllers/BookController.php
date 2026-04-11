<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Wajib dipanggil biar fungsi hapus gambar jalan

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->latest()->get();
        return view('book.index', compact('books'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('book.create', compact('categories'));
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

        Book::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $imageName,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        return redirect('/book')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function show($id)
    {
        $book = Book::with('category')->findOrFail($id);
        return view('book.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        // Ubah arah view ke folder book
        return view('book.edit', compact('book', 'categories'));
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

        $book = Book::findOrFail($id);

        if ($request->hasFile('image')) {
            $oldImagePath = public_path('assets/images/products/' . $book->image);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/images/products'), $imageName);

            $book->image = $imageName;
        }

        $book->name = $request->name;
        $book->category_id = $request->category_id;
        $book->price = $request->price;
        $book->stock = $request->stock;
        $book->description = $request->description;

        $book->save();

        return redirect('/book')->with('success', 'Data buku berhasil diupdate!');
    }
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        $imagePath = public_path('assets/images/products/' . $book->image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $book->delete();

        return redirect('/book')->with('success', 'Buku berhasil dihapus!');
    }
    public function showCategory($id)
    {
        $category = Category::with('books')->findOrFail($id);
        return view('category.show', compact('category'));
    }
}
