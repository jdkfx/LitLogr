<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\RakutenApiController;
use App\Http\Requests\BookSearchRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }

    public function showSearchBookPages()
    {
        return view('book.search');
    }

    public function searchBookList(BookSearchRequest $req)
    {
        $title          = $req->input('title');
        $keyword        = $req->input('keyword');
        $booksGenreId   = $req->input('booksGenreId');

        $bookLists = RakutenApiController::getBookData($title, $keyword, $booksGenreId);

        return view('book.search')->with([
            "bookLists"     => $bookLists,
            "keyword"       => $keyword,
            "title"         => $title,
            "booksGenreId"  => $booksGenreId,
        ]);
    }
}
