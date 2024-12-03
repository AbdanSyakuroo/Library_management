<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\PinjamBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('anggota.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
        $riwayat = PinjamBuku::all();
        
    return view('anggota.create', compact('riwayat'));
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        $book = Book::findOrFail($request->book_id);

        if (!$book->status) {
            return back()->with('error', 'Buku tidak tersedia untuk dipinjam.');
        }

        PinjamBuku::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'borrowed',
        ]);

        $book->update([
            'status' => false, // buku tidak tersedia
            'loan_status' => 'borrowed', // buku sedang dipinjam
        ]);

        return redirect()->back()->with('success', 'Buku berhasil dipinjam.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:available,borrowed', 
            
        ]);
        

        $book = Book::findOrFail($id);
        

        $book->update([
            'status' => $request->status === 'available', // ubah status buku
            'loan_status' => $request->status === 'available' ? 'available' : 'borrowed', // sesuaikan loan_status
        ]);


       

        return redirect()->back()->with('success', 'Status buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
