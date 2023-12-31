<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\StatisticsController;
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

Route::resource('items', ItemController::class)->only([
    'index', 'show', 'store', 'update'
]);
Route::get('/statistics', [StatisticsController::class, 'statistics']);
