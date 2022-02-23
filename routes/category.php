<?php

use Illuminate\Support\Facades\Route;




//Category Routes
Route::get('categories','Backend\CategoryController@index')->name('categories');
Route::post('store/categories','Backend\CategoryController@store')->name('store.category');
Route::get('delete/category/{id}','Backend\CategoryController@destroy')->name('delete.category');
Route::get('update/category/{id}','Backend\CategoryController@update');
Route::post('update/category/{id}','Backend\CategoryController@up')->name('update.category');
