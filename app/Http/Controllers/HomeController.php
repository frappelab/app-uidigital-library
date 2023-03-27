<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $books = Book::latest()->paginate(5);
        return view('home', compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

        // $books = Book::latest()->paginate(5);
        // return view('home', compact('books'));
    }
}
