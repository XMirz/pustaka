<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Stock;
use Illuminate\Database\Seeder;

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
        $name = ["Bahasa Indonesia", "Matematika", "Bahasa Inggris"];
        $code = ["BI", "MT", "EN"];
        for ($i = 0; $i < count($name); $i++) {
            $cat = new Category();
            $cat->name = $name[$i];
            $cat->category_code = $code[$i];
            $cat->save();
        }

        Author::create([
            'name' => 'Antonio Valencia'
        ]);
        Author::create([
            'name' => 'Louis Frank',
            'description' => 'Anu'
        ]);
        Publisher::create([
            'name' => 'Gramedia',
            'description' => 'Number 1',
            'address' => 'Jakarta'
        ]);
        Publisher::create([
            'name' => 'XMirz',
            'description' => 'Anjay Mabar',
            'address' => 'Bandung'
        ]);

        Book::factory(10)->create();
        $books = Book::select(['id', 'amount'])->get();
        foreach ($books as $b) {
            Stock::create([
                'stock' => $b->amount,
                'book_id' => $b->id
            ]);
        }
    }
}
