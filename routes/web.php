<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;

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

Route::get('/player',[PlayerController::class, 'index'])->middleware('auth')->name('player.index');
Route::get('/players/create', [PlayerController::class, 'create']);
Route::get('/players/{player}', [PlayerController::class ,'show']);
Route::post('/players', [PlayerController::class, 'store']);
Route::get('/players/{player}/edit', [PlayerController::class, 'edit']);
Route::put('/players/{player}', [PlayerController::class, 'update']);
Route::delete('/players/{player}', [PlayerController::class,'delete']);

Route::get('/game',[GameController::class, 'index'])->middleware('auth')->name('game.index');
Route::get('/games/create', [GameController::class, 'create'])->middleware('auth')->name('game.create');
Route::get('/games/{game}', [GameController::class ,'show']);
Route::post('/games', [GameController::class, 'store']);
Route::get('/games/{game}/edit', [GameController::class, 'edit']);
Route::put('/games/{game}', [GameController::class, 'update']);
Route::delete('/games/{game}', [GameController::class,'delete']);
Route::post('/games/{id}', 'GameController@update');
require __DIR__.'/auth.php';
