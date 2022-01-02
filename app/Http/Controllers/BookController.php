<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Stock;
use App\View\Components\FrontBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use View;

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

  public function create()
  {
    $categories = Category::all();
    return view('books.create', compact('categories'));
  }


  public function store(Request $request)
  {

    // Cek jika penulis yang diinputkan user suda ada atau belum, jika belum, maka masukkan ke tabel publishers
    $book = $this->getBook($request);
    $request->file('cover')->store('images/cover');
    // Store file and save to variable the new generated name
    $book['cover'] = $request->file('cover')->store('images/cover');

    $book = Book::create($book); // Simpan ke database
    Stock::create([
      'book_id' => $book->id,
      'stock' => $book->amount
    ]);
    return redirect()->route('books.index')->with('type', 'success')->with('message', 'Buku \'' . $book->title . '\' berhasil ditambahkan!');
  }

  public function show(Book $book)
  {
    $bookCard = new FrontBook($book);
    $response["status"] = 'ok';
    $response["html"] = $bookCard->render()->with($bookCard->data())->render();
    return $response;
  }

  public function edit(Book $book)
  {
    $categories = Category::all();
    return view('books.edit', compact('book', 'categories'));
  }

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
    $updateRequest = $this->getBook($request, $book);
    if ($request->file('cover')) {
      if ($request->cover_old) {
        Storage::delete($request->cover_old);
      }
      $updateRequest['cover'] = $request->file('cover')->store('images/cover');
    }
    $book->update($updateRequest); // Simpan ke database
    $targetStock = Stock::firstWhere('book_id', '=', $book->id);
    $targetStock->update([
      "stock" => ($book->amount - $totalBorrowed)
    ]);
    return redirect()->route('books.index')->with('type', 'success')->with('message', 'Buku \'' . $book->title . '\' berhasil diperbarui!');
  }


  public function destroy(Book $book)
  {
    if ($book->borrowings()->where('status', '=', 'NOT_RETURNED')->doesntExist()) {
      $book->delete();
      $response["status"] = "ok";
    } else {
      $response["status"] = "failed";
    };
    return $response;
  }

  public function getBook(Request $request, $book = null): array
  {
    $request->validate([
      'book_code' => [
        function ($attribute, $value, $fail) use ($book) {
          $try = Book::firstWhere('book_code', '=', $value);
          if ($book == null) {
            if ($try) {
              $fail('Kode buku \'' . $value . '\' telah dipakai.');
            }
          } else {
            if ($value != $book->book_code) {
              $fail('Kode buku \'' . $value . '\' telah dipakai.');
            }
          }
        },
      ],
      'category_id' => 'required',
      'cover' => ['image', 'max:2048'],
    ], [
      'category_id.required' => "Pilih kategory buku.",
      'cover.max' => "Ukuran cover maksimal 2MB.",
      'cover.image' => "Cover harus berupa gambar ('jpg','png')"
    ]);
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
