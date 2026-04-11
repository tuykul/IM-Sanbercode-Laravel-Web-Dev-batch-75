<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {

        $transactions = Transaction::with(['book', 'user'])->latest()->get();

        return view('transaction.index', compact('transactions'));
    }

    public function create($book_id)
    {
        $book = \App\Models\Book::findOrFail($book_id);

        return view('transaction.create', compact('book'));
    }


    public function store(Request $request, $book_id)
    {
        $request->validate([
            'type'     => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
        ]);

        $book = \App\Models\Book::findOrFail($book_id);


        if ($request->type == 'out' && $book->stock < $request->quantity) {
            return back()->withErrors(['quantity' => 'Stok tidak mencukupi untuk transaksi keluar!']);
        }

        \App\Models\Transaction::create([
            'book_id'    => $book->id,
            'user_id'    => auth()->id(),
            'type'       => $request->type,
            'quantity'   => $request->quantity,
            'total_price' => $book->price * $request->quantity
        ]);


        if ($request->type == 'in') {
            $book->increment('stock', $request->quantity);
        } else {
            $book->decrement('stock', $request->quantity);
        }

        return redirect('/transaction')->with('success', 'Transaksi berhasil dicatat!');
    }
}
