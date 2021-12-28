<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ["book", "member"];
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
