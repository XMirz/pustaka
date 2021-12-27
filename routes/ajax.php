<?php

use App\Models\Publisher;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/ajax', 'middleware' => 'auth'], function () {
  Route::get('/publisher/{query}', function ($query) {
    $query = explode(' ', $query);
    $publishers = Publisher::select('name');
    foreach ($query as $str) {
      $publishers->orWhere('name', 'like', '%' . $str . '%');
    }
    $publishers = $publishers->get();
    // $publishers = Publisher::select('name')->where('name', 'like', '%' . $query . '%')->get();
    return $publishers;
    // return $query;
  });
});
