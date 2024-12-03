<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::group(['middleware'=> ['auth', 'role:admin']], function(){
// Route::resource('books', BookController::class);
// Route::resource('users', UsersController::class);
// });


Route::middleware(['auth', 'role:admin'])->group(function () {
    // Resource routes for books
    // Custom route for 'inform' method
    Route::get('books/inform', [BookController::class, 'inform'])->name('books.inform');

    // Custom route for 'restate' method (PATCH to update book status)
    Route::put('books/{id}/status', [BookController::class, 'restate'])->name('books.restate');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('books', BookController::class);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UsersController::class);
});

Route::group(['middleware' => ['auth', 'role:anggota']], function () {
    Route::resource('anggota', AnggotaController::class);
});

// Route::resource('pinjaman', BorrowController::class);





// Route::middleware(['auth'])->group(function () {
//     // Menampilkan daftar buku (index)
//     Route::get('/books', [BookController::class, 'index'])->name('books.index');

//     // Menampilkan form untuk membuat buku baru (create)
//     Route::get('/books/create', [BookController::class, 'create'])->name('books.create')->middleware('role:admin');

//     // Menyimpan buku baru (store)
//     Route::post('/books', [BookController::class, 'store'])->name('books.store');

//     // Menampilkan detail buku tertentu (show)
//     Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

//     // Menampilkan form untuk mengedit buku (edit)
//     Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit')->middleware('role:admin');

//     // Memperbarui data buku tertentu (update)
//     Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');

//     // Menghapus buku tertentu (destroy)
//     Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
// });


require __DIR__ . '/auth.php';
