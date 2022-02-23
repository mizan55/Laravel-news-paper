<?php

use Illuminate\Support\Facades\Route;



//subcategory

Route::get('subcategories','Backend\SubCategoryController@index')->name('subcategories');

Route::post('store/subcategories','Backend\SubCategoryController@store')->name('store.subcategory');
Route::get('delete/subcategory/{id}','Backend\SubCategoryController@destroy')->name('delete.subcategory');
Route::get('update/subcategory/{id}','Backend\SubCategoryController@update');
Route::post('update/subcategory/{id}','Backend\SubCategoryController@up')->name('update.subcategory');