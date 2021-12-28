<?php

use App\Models\Author;
use App\Models\Book;
use App\Models\Member;
use App\Models\Publisher;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/ajax', 'middleware' => 'auth'], function () {
  Route::get('/authors/{query}', function ($query = null) {
    $query = explode(' ', $query);
    $authors = Author::select('name');
    foreach ($query as $str) {
      $authors->orWhere('name', 'like', '%' . $str . '%');
    }
    $authors = $authors->limit(5)->get();
    return $authors;
    // return $query;
  })->name('ajax.query.publishers');
  Route::get('/publishers/{query}', function ($query = null) {
    $query = explode(' ', $query);
    $publishers = Publisher::select('name');
    foreach ($query as $str) {
      $publishers->orWhere('name', 'like', '%' . $str . '%');
    }
    $publishers = $publishers->limit(5)->get();
    return $publishers;
  })->name('ajax.query.publishers');

  Route::get('/members/{query}', function ($query) {
    $queries = explode(' ', $query);
    $members = Member::select('name')->orWhere('name', "like", '%' . $query . '%');
    foreach ($queries as $str) {
      $members->orWhere('name', 'like', '%' . $str . '%');
    }
    $members = $members->limit(5)->get();
    return $members;
  })->name('ajax.query.members');

  Route::get('/bookcodes/{query}', function ($query) {
    $books = Book::select(['title', 'book_code'])->where('book_code', "like", '%' . $query . '%')->limit(5)->get();
    $bookcodes = [];
    foreach ($books as $b) {
      $bookcodes[] = [
        "label" => $b->book_code . " - " . $b->title,
        "code" => $b->book_code
      ];
    }
    return $bookcodes;
  })->name('ajax.query.bookcodes');
});
