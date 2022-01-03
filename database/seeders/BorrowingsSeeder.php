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
            "amount" => '3',
            "return_date" => Date::now(),
            "status" => "NOT_RETURNED",
            "book_id" => 4,
            "member_id" => 2,
        ]);

        $bookStock = Stock::firstWhere('id', '=', $borrowing->id);
        $minus = ($bookStock->stock - $borrowing->amount);
        $bookStock->update([
            "stock" => $minus
        ]);

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

        $borrowing = Borrowing::create([
            "amount" => '12',
            "return_date" => Date::now(),
            "status" => "NOT_RETURNED",
            "book_id" => 5,
            "member_id" => 3,
        ]);

        $bookStock = Stock::firstWhere('id', '=', $borrowing->id);
        $minus = ($bookStock->stock - $borrowing->amount);
        $bookStock->update([
            "stock" => $minus
        ]);
        $borrowing = Borrowing::create([
            "amount" => '4',
            "return_date" => Date::now(),
            "status" => "NOT_RETURNED",
            "book_id" => 10,
            "member_id" => 9,
        ]);

        $bookStock = Stock::firstWhere('id', '=', $borrowing->id);
        $minus = ($bookStock->stock - $borrowing->amount);
        $bookStock->update([
            "stock" => $minus
        ]);

        $borrowing = Borrowing::create([
            "amount" => '11',
            "return_date" => Date::now(),
            "status" => "NOT_RETURNED",
            "book_id" => 2,
            "member_id" => 2,
        ]);

        $bookStock = Stock::firstWhere('id', '=', $borrowing->id);
        $minus = ($bookStock->stock - $borrowing->amount);
        $bookStock->update([
            "stock" => $minus
        ]);

        $borrowing = Borrowing::create([
            "amount" => '2',
            "return_date" => Date::now(),
            "status" => "NOT_RETURNED",
            "book_id" => 5,
            "member_id" => 6,
        ]);

        $bookStock = Stock::firstWhere('id', '=', $borrowing->id);
        $minus = ($bookStock->stock - $borrowing->amount);
        $bookStock->update([
            "stock" => $minus
        ]);
    }
}
