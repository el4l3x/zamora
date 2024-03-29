<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'landing'])->name('home.landing');
Route::get('/noticias', [HomeController::class, 'posts'])->name('home.posts');
Route::get('noticias/{noticia}', [HomeController::class, 'show'])->name('home.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('admin')->group(function () {    
        Route::resources([
            /* 'categorias' => CategoryController::class,
            'tags' => TagController::class, */
            'posts' => PostController::class,
            'usuarios' => UserController::class,
            'roles' => RoleController::class,
        ]);

        Route::get('borradores', [PostController::class, 'borradores'])->middleware('can:borradores.index')->name('posts.borradores');
    });
});
