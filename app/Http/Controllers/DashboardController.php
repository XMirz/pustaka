<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Category;
use App\Models\Member;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $books = Book::latest()->get();
        $totalTitle = $books->count();
        $totalBooks = $books->sum('amount');

        $borrowings = Borrowing::where('status', '=', "NOT_RETURNED")->latest()->get();
        $totalBorrowedTitle = $borrowings->count();
        $totalBorrowedBooks = $borrowings->sum('amount');

        $members = Member::all();
        $totalMembers = $members->count();

        $categories = Category::withCount('books')->get();
        $totalCategories = $categories->count();
        return view('dashboard', compact('books', 'totalTitle', 'totalBooks', 'borrowings', 'totalBorrowedTitle', 'totalBorrowedBooks', 'totalMembers', 'totalCategories'));
    }
}
