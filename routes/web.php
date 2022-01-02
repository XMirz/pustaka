<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // Jika ada request parameter 'title', maka ambil db dan return ke view
    // query 'title' di convert ke low case, karen PostgreSql case sensitife dari default
    if (request('title')) {
        $results = Book::latest()->whereRaw('LOWER(`title`) LIKE ?', ['%' . strtolower(request('title')) . '%'])->limit(16)->get();
        return view('index', compact('results'));
    } else {
    }
    return view('index');
})->name('root');

Route::group(["middleware" => "auth"], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('books', BookController::class);
    Route::resource('borrowings', BorrowingController::class)->except(['create', 'show', 'edit', 'destroy']);
    Route::resource('members', MemberController::class)->except('show');
    Route::resource('categories', CategoryController::class)->except('show');
});


require __DIR__ . '/auth.php';
require __DIR__ . '/ajax.php';
