<?php

use App\Http\Controllers\AduanController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryLogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    $data['page_title'] = "Home";
    return view('home.index', $data);
})->name('home.index');
Route::get('/login', function () {
    $data['page_title'] = "Login";
    return view('home.login-fe', $data);
    // dd(Auth::user());
})->name('home.login');

Route::get('login-admin', function () {
    $data['page_title'] = "Login Admin";
    return view('auth.login-admin', $data);
})->name('login-admin');

Route::get('register', function () {
    $data['page_title'] = "Register";
    return view('home.register', $data);
})->name('register');

Route::post('loginPost2', [UserController::class, 'loginPost2'])->name('loginPost2');
Route::post('loginPostAdmin', [UserController::class, 'loginPostAdmin'])->name('loginPostAdmin');
Route::post('logout', [UserController::class, 'logout'])->name('logout');
Route::post('register-store', [RegisterController::class, 'store'])->name('register-store');

Route::middleware('auth:web')->group(function () {
    // Dashboard admin
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');


    Route::post('aduan-store', [AduanController::class, 'store'])->name('aduan-store');
    Route::get('akun/{id}', [AduanController::class, 'akun'])->name('akun');
    Route::get('daftar-keluhan', [AduanController::class, 'index'])->name('daftar-keluhan');
    Route::post('balas', [AduanController::class, 'balas'])->name('balas');
    
    // Master Data
     Route::get('master-data', function () {
        $data['page_title'] = 'Master Data';
        $data['breadcumb'] = 'Master Data';
        return view('master-data.index', $data);
    })->name('master-data.index');

    // Departement
    Route::resource('departements', DepartementController::class);

    // Users
    Route::patch('change-password', [UserController::class, 'changePassword'])->name('users.change-password');
    Route::resource('users', UserController::class)->except([
        'show'
    ]);;

    Route::get('user-destroy/{id}', [UserController::class, 'destroy'])->name('user-destroy');

    
    // History Log
    Route::resource('history-log', HistoryLogController::class)->except([
        'show', 'create', 'store', 'edit', 'update'
    ]);;

    // profilr edit
    Route::resource('profile', ProfileController::class)->except([
        'show','create', 'store'
    ]);;
    Route::patch('change-password-profile', [ProfileController::class, 'changePassword'])->name('profile.change-password');


});

