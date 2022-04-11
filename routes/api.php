<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/like/{id}', [ApiController::class, 'like'])->where(['id' => '[0-9]+']);
Route::post('/view/{id}', [ApiController::class, 'view'])->where(['id' => '[0-9]+']);
Route::post('/comment/create/{post_id}', [ApiController::class, 'createComment'])->where(['post_id' => '[0-9]+']);

