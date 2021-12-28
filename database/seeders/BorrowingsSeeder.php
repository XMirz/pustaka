<?php

namespace Database\Seeders;

use App\Models\Borrowing;
use App\Models\Stock;
use Date;
use Illuminate\Database\Seeder;

class BorrowingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $borrowing = Borrowing::create([
            "amount" => '4',
            "return_date" => Date::now(),
            "status" => "NOT_RETURNED",
            "book_id" => 1,
            "member_id" => 1,
        ]);

        $bookStock = Stock::firstWhere('id', '=', $borrowing->id);
        $minus = ($bookStock->stock - $borrowing->amount);
        $bookStock->update([
            "stock" => $minus
        ]);
    }
}
