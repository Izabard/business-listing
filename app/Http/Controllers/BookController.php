<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;

class BookController extends Controller
{
    public function create()
    {
        return view('book.create');
    }

    public function store(BookStoreRequest $request)
    {
        $book = new Book();
        $book->fill($request->except('_token'));
        $book->save();

        return redirect('/home')->with('message', 'Added!');
    }

    public function edit(Book $book)
    {
        return view('book.edit', ['book' => $book]);
    }

    public function update(Book $book, BookUpdateRequest $request)
    {
        $book->update([
           'title' => $request->title,
           'author' => $request->author
        ]);

        return redirect('/home')->with('message', 'Updated!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/home')->with('message', 'Deleted!');
    }
}
