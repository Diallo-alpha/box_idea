<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::resource('users', UserController::class);


Route::get('/inscription', [AuthController::class, 'getRegister'])->name('get.register');
Route::post('/inscription', [AuthController::class, 'register'])->name('register');
Route::get('/connexion', [AuthController::class, 'getLogin'])->name('login');
Route::post('/connexion', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('auth.logout');

Route::get('/', function()
    {
        return view('dashboard.admin');
    });
