<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [PagesController::class, 'index']);

Route::get('/', [TestControllerr::class, 'index']);

Route::post('form{count}', [PagesController::class, 'form']) ;
Route::post('/forms', [PagesController::class, 'forms']) ;

// ?>

