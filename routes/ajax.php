<?php

use App\Models\Author;
use App\Models\Book;
use App\Models\Member;
use App\Models\Publisher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/ajax', 'middleware' => 'auth'], function () {
  Route::get('/authors/{query}', function ($query = null) {
    // Handle full string
    $authors = Author::select('name')->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($query) . '%']);
    if ($authors->exists()) {
      return $authors->limit(4)->get();
    } else {
      $query = explode(' ', $query);
      $authorsExploded = Author::select('name');
      foreach ($query as $str) {
        $authorsExploded->orWhereRaw('LOWER(name) LIKE ?', ['%' . strtolower($str) . '%']);
      }
      $authorsExploded = $authorsExploded->limit(5)->get();
      return $authorsExploded;
    }
  })->name('ajax.query.publishers');


  Route::get('/publishers/{query}', function ($query = null) {
    $publishers = Publisher::select('name')->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($query) . '%']);
    if ($publishers->exists()) return $publishers->limit(4)->get();
    $query = explode(' ', $query);
    $publishers = Publisher::select('name');
    foreach ($query as $str) {
      $publishers->orWhereRaw('LOWER(name) LIKE ?', ['%' . strtolower($str) . '%']);
    }
    $publishers = $publishers->limit(5)->get();
    return $publishers;
  })->name('ajax.query.publishers');


  Route::get('/members/{query}', function ($query) {
    $members = Member::select('name')->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($query) . '%']);
    if ($members->exists()) return $members->limit(4)->get();
    // Handle Exploded
    $queries = explode(' ', $query);
    $members = '';
    $members = Member::select('name');
    foreach ($queries as $str) {
      $members->orWhereRaw('LOWER(name) LIKE ?', ['%' . strtolower($str) . '%']);
    }
    $members = $members->limit(5)->get();
    return $members;
  })->name('ajax.query.members');


  Route::get('/bookcodes/{query}', function ($query) {
    $books = Book::select(['title', 'book_code'])->whereRaw('LOWER(book_code) LIKE ?', ['%' . strtolower($query) . '%'])->limit(5)->get();
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
