<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $with = ['borrowing'];

    public function borrowing()
    {
        return $this->hasMany(Borrowing::class);
    }
}
