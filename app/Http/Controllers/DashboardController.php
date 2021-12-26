<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $totalTitle = $books->count();
        $totalBooks = $books->sum('amount');
        return view('dashboard', compact('totalTitle', 'totalBooks'));
    }
}
