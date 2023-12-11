<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/berita-penting', [HomeController::class, 'importantPost'])->name('important.post');
Route::get('/berita/{slug}', [HomeController::class, 'showPost'])->name('show.post');
Route::get('/otentikasi', [AuthController::class, 'login'])->name('login');
Route::post('/otentikasi-proses', [AuthController::class, 'authCheck'])->name('auth.check');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:kreator,admin'])->group(function () {
    Route::get('/halaman-dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/lihat-website', function() {
        return view('show-website');
    })->name('show.website');

    // Route Post
    Route::get('/data-berita', [PostController::class, 'index'])->name('post.list');
    Route::get('/input-berita', [PostController::class, 'create'])->name('post.input');
    Route::get('/edit-berita/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/upload-berita', [PostController::class, 'store'])->name('post.store');
    Route::put('/update-berita/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/hapus-berita/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    // Route Change Password
    Route::get('/ganti-password', [UserController::class, 'changePassword'])->name('user.change.password');
    Route::post('/update-password', [UserController::class, 'updatePassword'])->name('user.update.password');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Route Category
    Route::get('/data-kategori', [CategoryController::class, 'index'])->name('category.list');
    Route::get('/input-kategori', [CategoryController::class, 'create'])->name('category.input');
    Route::get('/edit-kategori/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/upload-kategori', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/update-kategori/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/hapus-kategori/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // Route User
    Route::get('/data-user', [UserController::class, 'index'])->name('user.list');
    Route::get('/input-user', [UserController::class, 'create'])->name('user.input');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/upload-user', [UserController::class, 'store'])->name('user.store');
    Route::put('/update-user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/hapus-user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::get('/link-storage', function () {
    Artisan::call('storage:link');
    return redirect()->route('welcome');
});
