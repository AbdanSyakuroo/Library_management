<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'judul_buku', 
        'penulis', 
        'kategori', 
        'tahun_terbit', 
        // 'jumlah_stok', 
        'status',
        'loan_status',
        'deskripsi'];

    public function borrow()
    {
        return $this->hasMany(PinjamBuku::class);
    }

}
