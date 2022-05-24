<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\SimpanController;
use App\Http\Controllers\PinjamController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
	
	Route::resources([
		'anggotas' => AnggotaController::class,
		'kasirs' => KasirController::class,
		'simpans' => SimpanController::class,
		'pinjams' => PinjamController::class,
	]);
});

require __DIR__.'/auth.php';
