<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingStoreRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Pinjambuku;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();
        $title = "History Peminjaman";
        return view('peminjaman', [
        'title' => $title,
        'peminjaman' => $peminjaman
    ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $peminjaman = Pinjambuku::findOrfail($id);
        $peminjaman->status = $request->status;
        $peminjaman->save();

        return redirect()->back();
    }

}
