<?php

use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/ajax', 'middleware' => 'auth'], function () {
  Route::get('/authors/{query?}', function ($query = null) {
    if (!$query) {
      $authors = Author::select('name')->limit(5)->get();
      return $authors;
    }
    $query = explode(' ', $query);
    $authors = Author::select('name');
    foreach ($query as $str) {
      $authors->orWhere('name', 'like', '%' . $str . '%');
    }
    $authors = $authors->limit(5)->get();
    return $authors;
    // return $query;
  })->name('ajax.query.publishers');
  Route::get('/publishers/{query?}', function ($query = null) {
    if (!$query) {
      $publishers = Publisher::select('name')->limit(5)->get();
      return $publishers;
    }
    $query = explode(' ', $query);
    $publishers = Publisher::select('name');
    foreach ($query as $str) {
      $publishers->orWhere('name', 'like', '%' . $str . '%');
    }
    $publishers = $publishers->limit(5)->get();
    // $publishers = Publisher::select('name')->where('name', 'like', '%' . $query . '%')->get();
    return $publishers;
    // return $query;
  })->name('ajax.query.publishers');
});
