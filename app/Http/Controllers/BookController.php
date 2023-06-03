<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Stock;
use App\Models\Editorial;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::latest()->paginate(5);
        return view('books.index', compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create')->with('authors', Author::all())->with('editorials', Editorial::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required|max:100',
            'isbn' => 'required|numeric|digits:13',
            'pages' => 'required|numeric|min:5|max:1500',
            'cover' => 'required',
            'author_id' => 'required',
            'editorial_id' => 'required',
        ]);

        Book::create($request->all());

        $book =  Book::orderBy('created_at', 'desc')->first();

        $stock = new Stock;

        $stock->book_id = $book->id;
        $stock->total = 180;
        $stock->created_at = '2023-03-26 22:49:46';
        $stock->save();


        return redirect()->route('books.index')
            ->with('success', 'Libro creado!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'))->with('authors', Author::all())->with('editorials', Editorial::all())->with('stocks', Stock::all());
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'))->with('authors', Author::all())->with('editorials', Editorial::all());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        request()->validate([
            'title' => 'required|max:100',
            'isbn' => 'required|numeric|digits:13',
            'pages' => 'required|numeric|min:5|max:1500',
            'cover' => 'required|max:255',
            'author_id' => 'required',
            'editorial_id' => 'required',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Libro actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {

        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Libro eliminado!');
    }
}
