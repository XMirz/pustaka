<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $totalTitle = $books->count();
        $totalBooks = $books->sum('amount');

        $borrowings = Borrowing::where('status', '=', "NOT_RETURNED");
        $totalBorrowedTitle = $borrowings->count();
        $totalBorrowedBooks = $borrowings->sum('amount');
        return view('dashboard', compact('totalTitle', 'totalBooks', 'totalBorrowedTitle', 'totalBorrowedBooks'));
    }
}
