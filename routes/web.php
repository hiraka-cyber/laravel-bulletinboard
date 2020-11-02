<?php

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

Route::get('/', function () {
    return view('board.index');
});

Route::resource('board', App\Http\Controllers\PostsController::class,['only' => ['index', 'show', 'create', 'store', 'edit', 'update','destroy']]);
Route::resource('comment', App\Http\Controllers\CommentsController::class,['only' => ['store']]);
