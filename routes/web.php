<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Authors
    Route::name('authors.')->group(function () {
        Route::get('/autores', [\App\Http\Controllers\AuthorController::class, 'index'])->name('index');
        Route::post('/autores', [\App\Http\Controllers\AuthorController::class, 'index'])->name('index');
        Route::get('/autores/novo', [\App\Http\Controllers\AuthorController::class, 'create'])->name('create');
        Route::post('/autores/store', [\App\Http\Controllers\AuthorController::class, 'store'])->name('store');
        Route::get('/autores/consultar/{id}', [\App\Http\Controllers\AuthorController::class, 'show'])->name('show');
        Route::get('/autores/editar/{id}', [\App\Http\Controllers\AuthorController::class, 'edit'])->name('edit');
        Route::put('/autores/update/{id}', [\App\Http\Controllers\AuthorController::class, 'update'])->name('update');
        Route::delete('/autores/apagar/{id}', [\App\Http\Controllers\AuthorController::class, 'destroy'])->name('destroy');
    });

    // Books
    Route::name('books.')->group(function () {
        Route::get('/livros', [\App\Http\Controllers\BookController::class, 'index'])->name('index');
        Route::post('/livros', [\App\Http\Controllers\BookController::class, 'index'])->name('index');
        Route::get('/livros/novo', [\App\Http\Controllers\BookController::class, 'create'])->name('create');
        Route::post('/livros/store', [\App\Http\Controllers\BookController::class, 'store'])->name('store');
        Route::get('/livros/consultar/{id}', [\App\Http\Controllers\BookController::class, 'show'])->name('show');
        Route::get('/livros/editar/{id}', [\App\Http\Controllers\BookController::class, 'edit'])->name('edit');
        Route::put('/livros/update/{id}', [\App\Http\Controllers\BookController::class, 'update'])->name('update');
        Route::delete('/livros/apagar/{id}', [\App\Http\Controllers\BookController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__.'/auth.php';
