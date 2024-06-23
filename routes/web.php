<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentaireController;

Route::resource('users', UserController::class);


Route::get('/inscription', [AuthController::class, 'getRegister'])->name('get.register');
Route::post('/inscription', [AuthController::class, 'register'])->name('register');
Route::get('/connexion', [AuthController::class, 'getLogin'])->name('login');
Route::post('/connexion', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');  ///->middleware('auth:sanctum')

Route::get('/', function()
    {
        return view('dashboard.admin');
    });
/*route  categories */
Route::resource('categories', CategorieController::class)->parameters([
    'categories' => 'categorie'
])->names([
    'index' => 'categories.index',
    'create' => 'categories.create',
    'store' => 'categories.store',
    'show' => 'categories.show',
    'edit' => 'categories.edit',
    'update' => 'categories.update',
    'destroy' => 'categories.destroy'
]);
Route::resource('idees', IdeeController::class);
Route::resource('commentaires', CommentaireController::class);
