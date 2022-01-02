<?php

namespace App\Http\Requests;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;

class BorrowingStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $redirectRoute = "borrowings.index";

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "book_code" => ["required", "exists:books,book_code"],
            "borrower" => ["required", "exists:members,name"],
            "amount" => [
                "required",
                function ($attribute, $value, $fail) {
                    $targetBook = Book::firstWhere('book_code', '=', $this->get('book_code'));
                    if ($value < 1) {
                        $fail('Jumlah buku minimal 1');
                    } else if ($targetBook != null && $value > $targetBook->stock->stock) {
                        $fail('Jumlah melebihi stok (' . $targetBook->stock->stock . ')');
                    }
                },
            ],
            "return_date" => ["required", "after_or_equal:now",]
        ];
    }
    public function messages()
    {
        return [
            "book_code.exists" => "Kode buku salah",
            "borrower.exists" => "Nama peminjam tidak valid",
            "return_date.after_or_equal" => "Tanggal pengembalian tidak valid"
        ];
    }
}
