<?php

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
Route::get('/', function () {
    return view('welcome');
});


Route::prefix('/support')->name('support')->group(function(){

    Route::get('/admin', function () {
            return view('support.admin');
    }) ;
    Route::get('/contact', function () {
        return view('support.contact');
    }) ;
    Route::get('/database', function () {
        return view('support.database');
    }) ;
    Route::get('/managers', function () {
        return view('support.managers');
    }) ;
    Route::get('/page', function () {
        return view('support.page');
    }) ;
    Route::get('/page2', function () {
        return view('support.page2');
    }) ;
    Route::get('/service', function () {
        return view('support.service');
    }) ;

    Route::get('/user', function () {
        return view('support.user');
    }) ;
    Route::get('/user1', function () {
        return view('support.user1');
    }) ;
    Route::get('/users', function () {
        return view('support.users');
    });
});



Route::prefix('/products')->name('products')->group(function(){
    Route::get('/brand', function () {
        return view('products.brand');
}) ;
Route::get('/brand1', function () {
    return view('products.brand1');
}) ;
Route::get('/brand2', function () {
    return view('products.brand2');
}) ;
Route::get('/company', function () {
    return view('products.company');
}) ;
Route::get('/company1', function () {
    return view('products.company1');
}) ;
Route::get('/company2', function () {
    return view('products.company2');
}) ;
Route::get('/model', function () {
    return view('products.model');
}) ;

Route::get('/model1', function () {
    return view('products.model1');
}) ;
Route::get('/model2', function () {
    return view('products.model2');
}) ;
Route::get('/prices', function () {
    return view('products.prices');
    });
});



Route::prefix('/technologies')->name('technologies')->group(function(){
    Route::get('/camera', function () {
        return view('technologies.camera');
}) ;
Route::get('/gadget1', function () {
    return view('technologies.gadget1');
}) ;
Route::get('/gadget2', function () {
    return view('technologies.gadget2');
}) ;
Route::get('/gadgets', function () {
    return view('technologies.gadgets');
}) ;
Route::get('/iphone_brands', function () {
    return view('technologies.iphone_brands');
}) ;
Route::get('/laptop_asus', function () {
    return view('technologies.laptop_asus');
}) ;
Route::get('/laptop_hp', function () {
    return view('technologies.laptop_hp');
}) ;

Route::get('/laptop', function () {
    return view('technologies.laptop');
}) ;
Route::get('/phone', function () {
    return view('technologies.phone');
}) ;
Route::get('/smarttv', function () {
    return view('technologies.smarttv');
    });
});


?>

