<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
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
//Article Routes
Route::get('/', [ArticleController::class, "index"]);
Route::get('/articles', [ArticleController::class, "index"]);

Route::get('articles/detail/{id}', [ArticleController::class, "detail"]);

Route::get('/articles/add', [ArticleController::class, 'add']);
Route::post('/articles/add', [ArticleController::class, 'create']);

Route::get('/articles/delete/{id}', [ArticleController::class, 'delete']);

//////////////////////////////

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Comment Route
Route::post('/comment/add', [CommentController::class, 'add']);
Route::get('/comment/delete/{id}', [CommentController::class, 'delete']);



