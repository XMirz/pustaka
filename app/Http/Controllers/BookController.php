<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Stock;
use Illuminate\Http\Request;

class BookController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $books = Book::all();
    $totalTitle = $books->count();
    $totalBooks = $books->sum('amount');

    $categories = Category::withCount('books')->get();
    $totalCategories = $categories->count();
    return view('books.index', compact('books', 'totalTitle', 'totalBooks', 'categories', 'totalCategories'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::all();
    return view('books.create', compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // Cek jika penulis yang diinputkan user suda ada atau belum, jika belum, maka masukkan ke tabel publishers
    $book = $this->getBook($request);
    Book::create($book); // Simpan ke database
    return redirect()->route('books.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Book  $book
   * @return \Illuminate\Http\Response
   */
  public function show(Book $book)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Book  $book
   * @return \Illuminate\Http\Response
   */
  public function edit(Book $book)
  {
    $categories = Category::all();
    return view('books.edit', compact('book', 'categories'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Book  $book
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Book $book)
  {
    $totalBorrowed = Borrowing::where('book_id', '=', $book->id)->where('status', '=', 'NOT_RETURNED')->orWhere('status', '=', 'LOST')->sum('amount');
    $request->validate(
      [
        "amount" => [
          "required",
          function ($attribute, $value, $fail) use ($request, $totalBorrowed) {

            if ($value < $totalBorrowed) {
              $fail('Jumlah kurang dari jumlah buku yang dipinjam (' . $totalBorrowed . ')');
            }
          },
        ],
      ],
      [
        // "amount." => "Tanggal pengembalian tidak valid"
      ]
    );

    // Cek jika penulis yang diinputkan user suda ada atau belum, jika belum, maka masukkan ke tabel publishers
    $updateRequest = $this->getBook($request);
    $book->update($updateRequest); // Simpan ke database
    $targetStock = Stock::firstWhere('book_id', '=', $book->id);
    $targetStock->update([
      "stock" => ($book->amount - $totalBorrowed)
    ]);
    return redirect()->route('books.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Book  $book
   * @return \Illuminate\Http\Response
   */
  public function destroy(Book $book)
  {
    //
  }

  /**
   * @param Request $request
   * @return array
   */
  public function getBook(Request $request): array
  {
    if (!Publisher::firstWhere('name', '=', $request->get('publisher'))) {
      Publisher::create([
        'name' => $request->get('publisher')
      ]);
    }
    // Cek jika penulis yang diinputkan user suda ada atau belum, jika belum, maka masukkan ke tabel authors
    if (!Author::firstWhere('name', '=', $request->get('author'))) {
      Author::create([
        'name' => $request->get('author')
      ]);
    }
    // Ambil id penulis dan penerbit
    $publisherId = Publisher::select('id')->firstWhere('name', '=', $request->get('publisher'))->id;
    $authorId = Author::select('id')->firstWhere('name', '=', $request->get('author'))->id;

    // Ambil semua input user dan masukkan ke variabel
    $book = request()->all();
    // Hapus input publisher dan author karena kita hanya butuh id
    unset($book['publisher']);
    unset($book['author']);
    // Tambah id penerbit dan id penulis ke author
    $book['publisher_id'] = $publisherId;
    $book['author_id'] = $authorId;
    return $book;
  }
}
