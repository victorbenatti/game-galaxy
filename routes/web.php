<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::resource('produtos', ProdutoController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('produtos/{produto}', [ProdutoController::class, 'show'])->name('produtos.show');

Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');

Route::middleware(['auth'])->group(function () {
    Route::get('produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('produtos', [ProdutoController::class, 'store'])->name('produtos.store');
    Route::get('produtos/{produto}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::put('produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');
    Route::delete('produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
});

require __DIR__.'/auth.php';

