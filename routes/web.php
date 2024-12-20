<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PengaduanController;
use Illuminate\Support\Facades\Auth;

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
    return view('home');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth')->get('/dashboard', [UserController::class, 'index'])->name('dashboard');
Route::get('/register', [RegisterController::class, 'tampil'])->name('account.register');
Route::post('/register', [RegisterController::class, 'register']);
// Route::get('/usertampil', [LoginController::class, 'loging']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->get('/dashboard_admin', function () {
    return view('dashboard_admin');
})->name('dashboard');

Route::post('/admin/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('admin.logout');

Route::get('/explore', [AuthController::class, 'explore'])->name('explore');
Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');



Route::get('/dashboard', [PengaduanController::class, 'dashboard'])->name('dashboard');

// Membuat pengaduan
Route::get('/bikin-pengaduan', [PengaduanController::class, 'create'])->name('bikinPengaduan');
Route::post('/bikin-pengaduan', [PengaduanController::class, 'store'])->name('storePengaduan');

// Melihat pengaduan
Route::get('/lihat-pengaduan', [PengaduanController::class, 'index'])->name('lihatPengaduan');


// Routes for Pengaduan
Route::middleware(['auth'])->group(function () {
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('lihatPengaduan');
    Route::post('/pengaduan/{id}/comment', [PengaduanController::class, 'addComment'])->name('addComment');
});

Route::get('/pengaduan/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show');
Route::post('/pengaduan/{id}/comment', [PengaduanController::class, 'addComment'])->name('addComment');
