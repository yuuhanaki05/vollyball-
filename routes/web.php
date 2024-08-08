<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemoController;

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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
    
Route::get('/user',[UserController::class, 'index'])->middleware('auth')->name('user.index');
Route::get('/memo',[MemoController::class, 'index'])->middleware('auth')->name('memo.index');
Route::get('/memos/create', [MemoController::class, 'create']);
Route::get('/memos/{memo}', [MemoController::class ,'show']);
Route::post('/memos', [MemoController::class, 'store']);
Route::get('/memos/{memo}/edit', [MemoController::class, 'edit']);
Route::put('/memos/{memo}', [MemoController::class, 'update']);
Route::delete('/memos/{memo}', [MemoController::class,'delete']);
require __DIR__.'/auth.php';
