<?php

namespace App\Http\Controllers;

use App\Http\Requests\BorrowingStoreRequest;
use App\Models\Borrowing;
use App\Models\Stock;
use App\Models\Book;
use App\Models\Member;
use Carbon\Carbon;
use Date;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$borrowings = Borrowing::where('status', '=', "NOT_RETURNED")->get();
		$borrowingsHistory = Borrowing::where('status', '=', "RETURNED")->get();
		$totalBorrowedTitle = $borrowings->count();
		$totalBorrowedBooks = $borrowings->sum('amount');
		return view('borrowings.index', compact('borrowings', 'borrowingsHistory', 'totalBorrowedTitle', 'totalBorrowedBooks'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(BorrowingStoreRequest $request)
	{
		$request->validated();
		$targetBook = Book::firstWhere('book_code', '=', $request->get('book_code'));
		$targetStock = $targetBook->stock;
		$targetMember = Member::firstWhere('name', '=', $request->get('borrower'));
		// ddd($request->all());
		$newBorrowing = Borrowing::create([
			"book_id" => $targetBook->id,
			"member_id" => $targetMember->id,
			"amount" => $request->get('amount'),
			"return_date" => $request->get('return_date'),
			"status" => "NOT_RETURNED",
		]);
		$targetStock->update([
			"stock" => ($targetStock->stock - $newBorrowing->amount)
		]);

		return redirect()->route('borrowings.index')->with('type', 'success')->with('message', 'Peminjaman baru telah ditambahkan!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Borrowing  $borrowing
	 * @return \Illuminate\Http\Response
	 */
	public function show(Borrowing $borrowing)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Borrowing  $borrowing
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Borrowing $borrowing)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Borrowing  $borrowing
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Borrowing $borrowing)
	{
		if ($request->isMethod(Request::METHOD_PATCH)) {
			$borrowing->update([
				"returned_at" => now(),
				"status" => "RETURNED"
			]);
			$targetStock = Stock::firstWhere('book_id', '=', $borrowing->book->id);
			// Update stock
			$targetStock->update([
				"stock" => ($targetStock->stock + $borrowing->amount)
			]);
			$response = [];
			if ($borrowing->wasChanged(["status", "returned_at"]))  $response["status"] = "ok";
			else $$response["status"] = "failed";
			return $response;
		} else if ($request->isMethod(Request::METHOD_PUT)) {
			if (!Carbon::createFromDate($request->return_date)->greaterThanOrEqualTo(now())) {
				$response["status"] = "failed";
				$response["message"] = "Tanggal pengembalian tidak valid";
				return $response;
			}
			$borrowing->update([
				"return_date" => $request->get('return_date'),
			]);
			$response = [];
			if ($borrowing->wasChanged(["return_date"]))  $response["status"] = "ok";
			else $response["status"] = "failed";
			return $response;
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Borrowing  $borrowing
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Borrowing $borrowing)
	{
		//
	}
}
