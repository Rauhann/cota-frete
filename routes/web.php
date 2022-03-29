<?php

/**
 * Actions
 */
use App\Actions\Home\GetHome;
use App\Actions\Home\GetIndex;

/**
 * Dependencias
 */
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

Route::get('', GetHome::class);
Route::get('/index', GetIndex::class);
