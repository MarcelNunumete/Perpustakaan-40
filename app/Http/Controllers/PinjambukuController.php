<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Pinjambuku;
use Illuminate\Http\Request;

class PinjambukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = Book::all();
        $title = "Pinjam Buku";
        return view('pinjambuku', [
            'title' => $title,
            'book' => $book
        ]);
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
        // dd($request->all());
        $request->validate([
            'nama_peminjam' => 'required|string',
            'judul' => 'required|string',
         
        ]);

        Pinjambuku::create($request->all());

        return redirect()->route('peminjaman.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pinjambuku $pinjambuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pinjambuku $pinjambuku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pinjambuku $pinjambuku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pinjambuku $pinjambuku)
    {
        //
    }
}
