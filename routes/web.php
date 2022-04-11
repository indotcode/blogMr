<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/articles', [HomeController::class, 'articles'])->name('articles');
Route::get('/articles/{tag}', [HomeController::class, 'tag'])->name('articles.tag');
Route::get('/post/{slug}', [HomeController::class, 'post'])->name('post');
