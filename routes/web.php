<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/items', [ItemController::class, 'index'])->name('index');
Route::redirect('/', '/items');

Route::get('/create', [ItemController::class, 'create'])->name('create');

Route::post('/items', [ItemController::class, 'store'])->name('store');

Route::get('/items/{item}', [ItemController::class, 'show'])->name('show');


Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('edit');

Route::patch('/items/{item}', [ItemController::class,'update']) ->name('update');

Route::delete('/items/{item}', [ItemController::class,'destroy']) ->name('destroy');
