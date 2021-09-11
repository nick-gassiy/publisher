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



//Route::get('/test','App\Http\Controllers\BookController@myBooks')->name('test');
Route::get('/books/all','App\Http\Controllers\BookController@getAllBooks')->name('all.books');
Route::get('/authors/all','App\Http\Controllers\UserController@getAuthors')->name('all.authors');
Route::get('/contractor/all','App\Http\Controllers\SupplyController@getAllContractors')->name('all.contractors');
Route::get('/supplies/all','App\Http\Controllers\SupplyController@allSupplies')->name('all.supplies');

Route::get('/book/{id}','App\Http\Controllers\BookController@getBook')->name('bookDetails');

Route::delete('/book/{id}','App\Http\Controllers\BookController@deleteBook')->name('delete.book');
Route::delete('/contractor/{id}','App\Http\Controllers\SupplyController@deleteContractor')->name('delete.contractor');
Route::delete('/supply/{id}','App\Http\Controllers\SupplyController@deleteSupply')->name('delete.supply');
Route::delete('/author/{id}','App\Http\Controllers\UserController@deleteAuthor')->name('delete.author');




Route::middleware('oauth')->group(function(){
//    Route::get('/book/{id}','App\Http\Controllers\BookController@getBook')->name('bookDetails');

    Route::middleware(['author'])->group(function(){
        Route::get('/','App\Http\Controllers\BookController@myBooks')->name('myList');

    });
    Route::middleware(['wemployee'])->group(function(){
        Route::get('/','App\Http\Controllers\SupplyController@mySupplies')->name('myList');

    });


    Route::middleware('employee')->group(function(){

    });


    Route::middleware('admin')->group(function(){

    });
});


