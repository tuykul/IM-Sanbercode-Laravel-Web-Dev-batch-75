<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        $totalBooks = Book::count();
        $totalCategories = Category::count();
        $totalTransactions = Transaction::count();

        $lowStockBooks = Book::where('stock', '<', 5)->get();

        $recentTransactions = Transaction::with(['book', 'user'])
                                ->latest()
                                ->take(5)
                                ->get();

        return view('home', compact(
            'totalBooks',
            'totalCategories',
            'totalTransactions',
            'lowStockBooks',
            'recentTransactions'
        ));
    }
}
