<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PinjamBuku;
use App\Models\Book;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung data yang diperlukan
        $pinjambuku = PinjamBuku::where('status', 'borrowed')->count();
        $kembalibuku = Book::where('loan_status', 'available')->count();
        $jumlahminjam = PinjamBuku::where('status', 'available')->count();
        $buku = Book::count();

        // Kirim data ke view dashboard
        return view('dashboard', compact('pinjambuku', 'kembalibuku', 'jumlahminjam', 'buku'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
