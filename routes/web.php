<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaisonneuveController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\BlogPostController;

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

// Langues

Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

// Étudiants
// pseudonyme pour faire référence ailleurs dans le code. Même principe que les variables css
Route::get('maisonneuve', [MaisonneuveController::class, 'index'])->name('maisonneuve');
Route::get('maisonneuve/{etudiant}', [MaisonneuveController::class, 'show'])->name('maisonneuve.show');
Route::get('maisonneuve-create', [MaisonneuveController::class, 'create'])->name('maisonneuve.create');
Route::post('maisonneuve-create', [MaisonneuveController::class, 'store'])->name('maisonneuve.create.post');
Route::get('maisonneuve-edit/{etudiant}', [MaisonneuveController::class, 'edit'])->name('maisonneuve.edit')->middleware('auth');
Route::put('maisonneuve-edit/{etudiant}', [MaisonneuveController::class, 'update'])->name('maisonneuve.update')->middleware('auth');
Route::delete('maisonneuve/{etudiant}', [MaisonneuveController::class, 'destroy'])->name('maisonneuve.delete')->middleware('auth');

Route::get('query-test', [MaisonneuveController::class, 'query']);

// Authentification

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('custom.login');
Route::get('registration', [CustomAuthController::class, 'create'])->name('registration');
Route::post('custom-registration', [CustomAuthController::class, 'store'])->name('custom.registration');
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('forgot-password', [CustomAuthController::class, 'forgotPassword'])->name('forgot.password');
Route::post('forgot-password', [CustomAuthController::class, 'tempPassword'])->name('temp.password');
Route::get('new-password/{user}/{tempPassword}', [CustomAuthController::class, 'newPassword'])->name('new.password');
Route::post('new-password/{user}/{tempPassword}', [CustomAuthController::class, 'storeNewPassword']);

// Blogs

Route::get('blog', [BlogPostController::class, 'index'])->name('blog')->middleware('auth');
Route::get('blogs/{id}', [BlogPostController::class, 'index'])->name('blogs')->middleware('auth');
Route::get('blog/{blogPost}', [BlogPostController::class, 'show'])->name('blog.show')->middleware('auth');
Route::get('blog-create', [BlogPostController::class, 'create'])->name('blog.create')->middleware('auth');
Route::post('blog-create', [BlogPostController::class, 'store'])->name('blog.create.post')->middleware('auth');
Route::get('blog-edit/{blogPost}', [BlogPostController::class, 'edit'])->name('blog.edit')->middleware('auth');
Route::put('blog-edit/{blogPost}', [BlogPostController::class, 'update'])->name('blog.update')->middleware('auth');
Route::delete('blog/{blogPost}', [BlogPostController::class, 'destroy'])->name('blog.delete')->middleware('auth');
Route::get('blog-pdf/{blogPost}', [BlogPostController::class, 'showPDF'])->name('blog.showPdf')->middleware('auth');
