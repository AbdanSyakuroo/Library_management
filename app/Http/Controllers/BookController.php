<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\PinjamBuku;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    protected function validateBook($request)
    {
        $messages = [
            'required' => ':attribute wajib diisi.',
            'integer' => ':attribute harus berupa angka.',
            'min' => ':attribute harus minimal :min.',
            'max' => ':attribute harus maksimal :max.',
            'boolean' => ':attribute harus berupa nilai benar atau salah.'
        ];

        $attributes = [
            'judul_buku' => 'Judul Buku',
            'penulis' => 'Penulis',
            'kategori' => 'Kategori',
            'tahun_terbit' => 'Tahun Terbit',
            'jumlah_stok' => 'Jumlah Stok',
            'deskripsi' => 'Deskripsi Buku',
            'status' => 'Status'

        ];

        $request->validate([
            'judul_buku' => 'required',
            'penulis' => 'required',
            'kategori' => 'required',
            'tahun_terbit' => 'required|integer|min:1900|max:2099',
            // 'jumlah_stok' => 'required|integer',
            'deskripsi' => 'required',
            'status' => 'required'
        ], $messages, $attributes);
    }

    public function store(Request $request)
    {
        $this->validateBook($request);

        Book::create($request->all());

        return redirect('books');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'judul_buku' => 'required',
    //         'penulis' => 'required',
    //         'kategori' => 'required',
    //         'tahun_terbit' => 'required|integer',
    //         'jumlah_stok' => 'required|integer',
    //         'status' => 'required|boolean',
    //         'deskripsi' => 'required',
    //     ]);

    //     Book::create($request->all());

    //     return redirect('books');
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booksy = Book::findOrFail($id);
        return view('books.show', compact('booksy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $booksy = Book::findOrFail($id);
        return view('books.edit', compact('booksy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validateBook($request);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('books');
    }
    public function test()
    {
        dd();
    }


    public function inform()
    {
        $riwayat = PinjamBuku::all();

        return view('books.inform', compact('riwayat'));
    }

    public function restate(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:available,borrowed', // validasi status
            'tanggal_pinjam' => 'nullable|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
        ]);

        $pinjambuku = PinjamBuku::findOrFail($id);
        $buku = Book::findOrFail($pinjambuku->book_id);
        $loan = pinjamBuku::findOrFail($id);

        $pinjambuku->update([
            'status' => $request->status === 'available' ? 'available' : 'borrowed', // ubah status buku
        ]);
       
        $buku->update([
            'status' => $request->status === 'available' ? 1 : 0, // ubah status buku
            'loan_status' => $request->status === 'available' ? 'available' : 'borrowed', // sesuaikan loan_status
        ]);

        $loan->update([
            'tanggal_kembali' => $request->tanggal_kembali,
            'tanggal_pinjam' => $request->tanggal_pinjam,
        ]);

        return redirect(route('books.inform'));
    }
}
