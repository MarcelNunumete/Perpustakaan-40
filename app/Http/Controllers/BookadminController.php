<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteBookRequest;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookStore;
use App\Models\Book;
use App\Models\Post;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class BookadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Book::all();
        $title = "Daftar buku";
        return view('BookAdmin', compact('data'),compact('title'));
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
    public function store(StoreBookRequest $request)
    {
        
        $validatedData = $request->validate([
            'judul' => 'required',
            'image' => 'image',
            'penerbit' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required'
        ]);
        
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        
        Book::create($validatedData);
        return redirect()->back()->with('success', "Buku telah ditambahkan");
    }

    public function show(Book $book, $id)
    {

        $book = Book::findOrfail($id);
    //    dd($book);
        return view('detailbook', [
            'book' => $book,
            'title' => 'Detail Buku',
           ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookStore $request, Book $book, $id)
    {
        $book = Book::findOrfail($id);
        $book->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteBookRequest $request, Book $book)
    {
        // return $request;
        Book::where('id', $request['book_id'])->delete();
        // $book->delete();
        return redirect()->back();
    }
}
