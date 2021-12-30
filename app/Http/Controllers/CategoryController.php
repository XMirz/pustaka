<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $totalTitle = $books->count();
        $totalBooks = $books->sum('amount');
        $categories = Category::withCount('books')->get();
        $totalCategories = $categories->count();
        return view('categories.index', compact('totalTitle', 'totalBooks', 'categories', 'totalCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newCat = $request->validate([
            "name" => "required|unique:categories,name",
            "category_code" => "required|unique:categories,category_code",
            "place" => "required",
        ]);
        $newCat["category_code"] = Str::upper($newCat["category_code"]);
        Category::create($newCat);
        return  redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $newCat = $request->validate([
            "name" => "required",
            "category_code" => "required",
            "place" => "required",
        ]);
        $newCat["category_code"] = Str::upper($newCat["category_code"]);
        $category->update($newCat);
        return  redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $response["status"] = "ok";
        return $response;
    }
}
