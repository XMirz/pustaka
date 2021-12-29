<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Stock;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category
        $name = ["Bahasa Indonesia", "Matematika", "Bahasa Inggris", "Filsafat", "Fiksi", "Umum"];
        $code = ["BI", "MT", "EN", "FS", "FK", "UM"];
        for ($i = 0; $i < count($name); $i++) {
            $cat = new Category();
            $cat->name = $name[$i];
            $cat->category_code = $code[$i];
            $cat->save();
        }


// id =1
        Author::create([
            'name' => 'Henry Manampiring'
        ]);
// id =2
        Author::create([
            'name' => 'Marah Rusli',
        ]);
// id =3
        Author::create([
            'name' => 'Hasan Alwi',
        ]);
// id =4
        Author::create([
            'name' => 'Hamka',
        ]);


// id =1
        Publisher::create([
            'name' => 'Kompas',
            'address' => 'Jl. Palmerah Selatan No.21, Gelora, Tanah Abang, Jakarta Pusat'
        ]);
// id =2
        Publisher::create([
            'name' => 'Balai Pustaka',
            'address' => 'Jl. Bunga No. 8-8A, Matraman, Jakarta Timur, DKI-Jakarta'
        ]);
// id =3
        Publisher::create([
            'name' => 'Bulan Bintang',
            'address' => 'Jl. Kramat Kwitang I, RT.4/RW.7, Kwitang, Kec. Senen, Kota Jakarta Pusat'
        ]);

// book
        $book = Book::create([
            'book_code' => Str::upper(Str::random(8)),
            'isbn' => '9786024125189',
            'title' => 'Filosofi Teras',
            'title_description' => 'Filsafat Yunani - Romawi Kuno Untuk Mental Tangguh Masa Kini',
            'edition' => '6',
            'publication_year' => '2019',
            'published_at' => 'Jakarta',
            'exemplar' =>'305',
            'amount' => 24,
            'category_id' => 4,
            'author_id' => 1,
            'publisher_id' => 1,
        ]);
        Stock::create([
            'stock' => $book->amount,
            'book_id' => $book->id
        ]);

        $book = Book::create([
            'book_code' => Str::upper(Str::random(8)),
            'isbn' => '9794071676',
            'title' => 'Siti Nurbaya ',
            'title_description' => 'Kasih Tak Sampai ',
            'edition' => '1',
            'publication_year' => '2021',
            'published_at' => 'Jakarta',
            'exemplar' =>'271',
            'amount' => 20,
            'category_id' => 5,
            'author_id' => 2,
            'publisher_id' => 2,
        ]);
        Stock::create([
            'stock' => $book->amount,
            'book_id' => $book->id
        ]);

        $book = Book::create([
            'book_code' => Str::upper(Str::random(8)),
            'isbn' => '9794071773',
            'title' => 'Tata Bahasa Baku Bahasa Indonesia',
            'title_description' => ' ',
            'edition' => '3',
            'publication_year' => '2003',
            'published_at' => 'Jakarta',
            'exemplar' =>'486',
            'amount' => 30,
            'category_id' => 1,
            'author_id' => 3,
            'publisher_id' => 2,
        ]);
        Stock::create([
            'stock' => $book->amount,
            'book_id' => $book->id
        ]);

        $book = Book::create([
            'book_code' => Str::upper(Str::random(8)),
            'isbn' => '9794180556',
            'title' => 'Tenggelamnya Kapal Van Der Wijck',
            'title_description' => '',
            'edition' => '1',
            'publication_year' => '1990',
            'published_at' => 'Jakarta',
            'exemplar' =>'224',
            'amount' => 10,
            'category_id' => 5,
            'author_id' => 4,
            'publisher_id' => 3,
        ]);
        Stock::create([
            'stock' => $book->amount,
            'book_id' => $book->id
        ]);

        // $book = Book::create([
        //     'book_code' => Str::upper(Str::random(8)),
        //     'isbn' => '9794180556',
        //     'title' => 'Tenggelamnya Kapal Van Der Wijck',
        //     'title_description' => '',
        //     'edition' => '1',
        //     'publication_year' => '1990',
        //     'published_at' => 'Jakarta',
        //     'exemplar' =>'224',
        //     'amount' => 10,
        //     'category_id' => 5,
        //     'author_id' => 4,
        //     'publisher_id' => 3,
        // ]);
        // Stock::create([
        //     'stock' => $book->amount,
        //     'book_id' => $book->id
        // ]);
    }
}
