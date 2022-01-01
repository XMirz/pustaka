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
        $name = ["Bahasa Indonesia", "Matematika", "Bahasa Inggris", "Filsafat", "Novel", "Agama", "Umum"];
        $code = ["BI", "MT", "EN", "FS", "NV", "AG", "UM"];
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
// id =5
        Author::create([
            'name' => 'Suherli',
        ]);
// id =6
        Author::create([
            'name' => 'Nurhasanah',
        ]);
// id =7
        Author::create([
            'name' => 'Utami Widiati, Zuliati Rohmah, Furaidah',
        ]);
// id =8
        Author::create([
            'name' => 'Sukino',
        ]);
// id =9
        Author::create([
            'name' => 'Wono Setya Budhi',
        ]);
// id =10
        Author::create([
            'name' => 'H. M. Arifin',
        ]);
// id =11
        Author::create([
            'name' => 'Fuad Ihsan',
        ]);
// id =12
        Author::create([
            'name' => 'Imam Al Algazali',
        ]);
// id =13
        Author::create([
            'name' => 'Nurcholish Madjid',
        ]);
// id =14
        Author::create([
            'name' => 'Abdoel Moeis',
        ]);
// id =15
        Author::create([
            'name' => 'Dr. M. Nurhakim, M.Ag',
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
// id =4
        Publisher::create([
            'name' => 'Kemendikbud',
            'address' => 'Jl. Jenderal Sudirman, Senayan, Jakarta Pusat'
        ]);
// id =5
        Publisher::create([
            'name' => 'Erlangga',
            'address' => 'Jl. H. Baping Raya No. 100 Ciracas Jakarta'
        ]);
// id =6
        Publisher::create([
            'name' => 'Bumi Aksara',
            'address' => 'Jl. Sawo Raya No. 18 Rawamangun Jakarta'
        ]);
// id =7
        Publisher::create([
            'name' => 'Rineka Cipta',
            'address' => 'Jl. Matraman Raya No. 148, Perkantoran Mitra Matraman Blok B. 1, RT.1/RW.4, Kb. Manggis, Kec. Matraman, Kota Jakarta Timur'
        ]);
// id =8
        Publisher::create([
            'name' => 'Taylor & Francis Inc.',
            'address' => 'Milton Park, Abingdon-on-Thames, Oxfordshire Britania Raya'
        ]);
// id =9
        Publisher::create([
            'name' => 'Paramadina',
            'address' => 'Pondok Indah Plaza III Blok F IV-VI Jl. TB Simatupang Jakarta Selatan'
        ]);
// id =10
        Publisher::create([
            'name' => 'Universitas Muhammadiyah Malang',
            'address' => 'Jl. Raya Tlogomas No.246, Malang, Jawa Timur'
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

        $book = Book::create([
            'book_code' => Str::upper(Str::random(8)),
            'isbn' => '9786024271022',
            'title' => 'BG Bahasa Indonesia Kelas XII Kur.2013',
            'title_description' => '',
            'edition' => '2',
            'publication_year' => '2018',
            'published_at' => 'Jakarta',
            'exemplar' =>'256',
            'amount' => 35,
            'category_id' => 1,
            'author_id' => 5,
            'publisher_id' => 4,
        ]);
        Stock::create([
            'stock' => $book->amount,
            'book_id' => $book->id
        ]);

        $book = Book::create([
            'book_code' => Str::upper(Str::random(8)),
            'isbn' => '9786024271022',
            'title' => 'Buku Guru Bahasa Indonesia SMA/MA/SMK/MAK Kelas XI',
            'title_description' => '',
            'edition' => '2',
            'publication_year' => '2017',
            'published_at' => 'Jakarta',
            'exemplar' =>'422',
            'amount' => 33,
            'category_id' => 1,
            'author_id' => 5,
            'publisher_id' => 4,
        ]);
        Stock::create([
            'stock' => $book->amount,
            'book_id' => $book->id
        ]);

        $book = Book::create([
            'book_code' => Str::upper(Str::random(8)),
            'isbn' => '9786024270995',
            'title' => 'Bahasa Indonesia untuk SMA/MA/SMK/MAK Kelas X',
            'title_description' => '',
            'edition' => '2',
            'publication_year' => '2016',
            'published_at' => 'Jakarta',
            'exemplar' =>'290',
            'amount' => 36,
            'category_id' => 1,
            'author_id' => 5,
            'publisher_id' => 4,
        ]);
        Stock::create([
            'stock' => $book->amount,
            'book_id' => $book->id
        ]);

        $book = Book::create([
            'book_code' => Str::upper(Str::random(8)),
            'isbn' => '9786024271107',
            'title' => 'Buku Guru Bahasa Inggris SMA/MA/SMK/MAK Kelas XI',
            'title_description' => '',
            'edition' => '2',
            'publication_year' => '2017',
            'published_at' => 'Jakarta',
            'exemplar' =>'160',
            'amount' => 30,
            'category_id' => 3,
            'author_id' => 6,
            'publisher_id' => 4,
        ]);
        Stock::create([
            'stock' => $book->amount,
            'book_id' => $book->id
        ]);

        $book = Book::create([
            'book_code' => Str::upper(Str::random(8)),
            'isbn' => '9786024271138',
            'title' => 'Buku Guru Bahasa Inggris SMA/MA/SMK/MAK Kelas XII',
            'title_description' => '',
            'edition' => '2',
            'publication_year' => '2018',
            'published_at' => 'Jakarta',
            'exemplar' =>'168',
            'amount' => 29,
            'category_id' => 3,
            'author_id' => 7,
            'publisher_id' => 4,
        ]);
        Stock::create([
            'stock' => $book->amount,
            'book_id' => $book->id
        ]);

        $book = Book::create([
            'book_code' => Str::upper(Str::random(8)),
            'isbn' => '9786022987949',
            'title' => 'MATEMATIKA UNTUK SMA/MA KELAS XII',
            'title_description' => '',
            'edition' => '1',
            'publication_year' => '2018',
            'published_at' => 'Jakarta',
            'exemplar' =>'252',
            'amount' => 25,
            'category_id' => 2,
            'author_id' => 8,
            'publisher_id' => 5,
        ]);
        Stock::create([
            'stock' => $book->amount,
            'book_id' => $book->id
        ]);

        $book = Book::create([
            'book_code' => Str::upper(Str::random(8)),
            'isbn' => '9786022989707',
            'title' => 'Bupena Matematika Wajib Untuk SMA/MA Kelas X',
            'title_description' => '',
            'edition' => '1',
            'publication_year' => '2014',
            'published_at' => 'Jakarta',
            'exemplar' =>'161',
            'amount' => 20,
            'category_id' => 2,
            'author_id' => 9,
            'publisher_id' => 5,
        ]);
        Stock::create([
            'stock' => $book->amount,
            'book_id' => $book->id
        ]);

        $book = Book::create([
            'book_code' => Str::upper(Str::random(8)),
            'isbn' => '9795260898',
            'title' => 'Filsafat pendidikan Islam',
            'title_description' => '',
            'edition' => '1',
            'publication_year' => '1994',
            'published_at' => 'Jakarta',
            'exemplar' =>'192',
            'amount' => 27,
            'category_id' => 6,
            'author_id' => 10,
            'publisher_id' => 6,
        ]);
        Stock::create([
            'stock' => $book->amount,
            'book_id' => $book->id
        ]);
        
        $book = Book::create([
            'book_code' => Str::upper(Str::random(8)),
            'isbn' => '9789795189817',
            'title' => 'Filsafat Ilmu',
            'title_description' => 'Perspektif Barat dan Islam',
            'edition' => '1',
            'publication_year' => '2010',
            'published_at' => 'Jakarta',
            'exemplar' =>'295',
            'amount' => 25,
            'category_id' => 4,
            'author_id' => 11,
            'publisher_id' => 7,
        ]);
        Stock::create([
            'stock' => $book->amount,
            'book_id' => $book->id
        ]);

        $book = Book::create([
            'book_code' => Str::upper(Str::random(8)),
            'isbn' => '9786023100002',
            'title' => 'Kerancuan Filsafat',
            'title_description' => 'Tahafut Al-Falasifah',
            'edition' => '1',
            'publication_year' => '2015',
            'published_at' => 'Yogyakarta',
            'exemplar' =>'372',
            'amount' => 25,
            'category_id' => 4,
            'author_id' => 12,
            'publisher_id' => 8,
        ]);
        Stock::create([
            'stock' => $book->amount,
            'book_id' => $book->id
        ]);

        $book = Book::create([
            'book_code' => Str::upper(Str::random(8)),
            'isbn' => '9798321057',
            'title' => 'Islam Agama Peradaban',
            'title_description' => 'Membangun Makna dan Relevansi Doktrin Islam Dalam Sejarah',
            'edition' => '1',
            'publication_year' => '1995',
            'published_at' => 'Jakarta',
            'exemplar' =>'326',
            'amount' => 50,
            'category_id' => 6,
            'author_id' => 13,
            'publisher_id' => 9,
        ]);
        Stock::create([
            'stock' => $book->amount,
            'book_id' => $book->id
        ]);

        $book = Book::create([
            'book_code' => Str::upper(Str::random(8)),
            'isbn' => '9794180637',
            'title' => 'Di Bawah Lindungan Kabah',
            'title_description' => '',
            'edition' => '1',
            'publication_year' => '1988',
            'published_at' => 'Jakarta',
            'exemplar' =>'813',
            'amount' => 60,
            'category_id' => 5,
            'author_id' => 4,
            'publisher_id' => 3,
        ]);
        Stock::create([
            'stock' => $book->amount,
            'book_id' => $book->id
        ]);

        $book = Book::create([
            'book_code' => Str::upper(Str::random(8)),
            'isbn' => '9794071102',
            'title' => 'Salah Asuhan',
            'title_description' => '',
            'edition' => '1',
            'publication_year' => '2013',
            'published_at' => 'Jakarta',
            'exemplar' =>'144',
            'amount' => 45,
            'category_id' => 5,
            'author_id' => 14,
            'publisher_id' => 3,
        ]);
        Stock::create([
            'stock' => $book->amount,
            'book_id' => $book->id
        ]);

        $book = Book::create([
            'book_code' => Str::upper(Str::random(8)),
            'isbn' => '9789797966492',
            'title' => 'Metodologi Studi Islam',
            'title_description' => '',
            'edition' => '1',
            'publication_year' => '2021',
            'published_at' => 'Malang',
            'exemplar' =>'280',
            'amount' => 30,
            'category_id' => 6,
            'author_id' => 15,
            'publisher_id' => 10,
        ]);
        Stock::create([
            'stock' => $book->amount,
            'book_id' => $book->id
        ]);
    }
}
