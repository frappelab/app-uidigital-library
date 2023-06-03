<?php

namespace App\Http\Controllers;

use App\Models\BorrowedBook;
use App\Models\Stock;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Log;

class BorrowedBookController extends Controller
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
    }

    /**
     * Display the specified resource.
     */
    public function show(BorrowedBook $borrowedBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BorrowedBook $borrowedBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BorrowedBook $borrowedBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BorrowedBook $borrowedBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function BorrewedBookSave(Request $request)
    {
        request()->validate([
            'book_id' => 'required',
            'delivery_date' => 'required',
        ]);

        $borrowedBook = new BorrowedBook();
        $borrowedBook->book_id = $request->input('book_id');
        $borrowedBook->loan_date = date('Y-m-d');
        $borrowedBook->delivery_date = $request->input('delivery_date');

        $borrowedBook->save();
       
        Stock::where('book_id', $request->book_id)
            ->update([
                'total' => $request->total - 1
            ]);

        return redirect()->route('books.index')
            ->with('success', 'Libro prestado!');
    }
}
