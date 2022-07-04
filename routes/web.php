<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaisonneuveController;

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

Route::get('/', function () {
    return view('welcome');
});

// pseudonyme pour faire référence ailleurs dans le code. Même principe que les variables css
Route::get('maisonneuve', [MaisonneuveController::class, 'index'])->name('maisonneuve');
Route::get('maisonneuve/{etudiant}', [MaisonneuveController::class, 'show'])->name('maisonneuve.show');
Route::get('maisonneuve-create', [MaisonneuveController::class, 'create'])->name('maisonneuve.create');
Route::post('maisonneuve-create', [MaisonneuveController::class, 'store'])->name('maisonneuve.create.post');
Route::get('maisonneuve-edit/{etudiant}', [MaisonneuveController::class, 'edit'])->name('maisonneuve.edit');
Route::put('maisonneuve-edit/{etudiant}', [MaisonneuveController::class, 'update'])->name('maisonneuve.update');
Route::delete('maisonneuve/{etudiant}', [MaisonneuveController::class, 'destroy'])->name('maisonneuve.delete');

Route::get('query-test', [MaisonneuveController::class, 'query']);
