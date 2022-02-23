<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('frontend.index');
});

 Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout', 'HomeController@logout')->name('user.logout');

// AdminRoutsHere
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//Category Routes
// Route::get('categories','Backend\CategoryController@index')->name('categories');
// Route::post('store/categories','Backend\CategoryController@store')->name('store.category');
// Route::get('delete/category/{id}','Backend\CategoryController@destroy')->name('delete.category');
// Route::get('update/category/{id}','Backend\CategoryController@update');
// Route::post('update/category/{id}','Backend\CategoryController@up')->name('update.category');
//subcategory

// Route::get('subcategories','Backend\SubCategoryController@index')->name('subcategories');

// Route::post('store/subcategories','Backend\SubCategoryController@store')->name('store.subcategory');
// Route::get('delete/subcategory/{id}','Backend\SubCategoryController@destroy')->name('delete.subcategory');
// Route::get('update/subcategory/{id}','Backend\SubCategoryController@update');
// Route::post('update/subcategory/{id}','Backend\SubCategoryController@up')->name('update.subcategory');

//District Routes
 Route::get('districts','Backend\districtController@index')->name('districts');
Route::post('store/distric','Backend\districtController@store')->name('store.district');
 Route::get('delete/district/{id}','Backend\districtController@destroy')->name('delete.district');
 Route::get('update/district/{id}','Backend\districtController@update');
 Route::post('update/district/{id}','Backend\districtController@up')->name('update.district');


 //subDistrict

 Route::get('subdistricts','Backend\SubdistrictController@index')->name('subdistricts');

 Route::post('store/subdistrict','Backend\SubdistrictController@store')->name('store.subdistrict');
 Route::get('delete/subdistrict/{id}','Backend\SubdistrictController@destroy')->name('delete.subdistrict');
 Route::get('update/subdistrict/{id}','Backend\SubdistrictController@update');
 Route::post('update/subdistrict/{id}','Backend\SubdistrictController@up')->name('update.subdistrict');
 
 
 //post
 Route::get('insert/post','Backend\PostController@create')->name('insert.post'); 
 Route::post('store/post','Backend\PostController@store')->name('store.post');
 Route::get('all/post','Backend\PostController@index')->name('all.post');
 Route::get('edit/post/{id}','Backend\PostController@edit');
 Route::get('delete/post/{id}','Backend\PostController@destroy')->name('delete.post'); 
 Route::post('update/post/{id}','Backend\PostController@update')->name('update.post');

//jason multi data
Route::get('/get/subcat/{cat_id}','Backend\PostController@GetSubcat');
Route::get('/get/subdist/{dist_id}','Backend\PostController@GetSubdist');

//seo setting
Route::get('seo/setting','Backend\SeosController@index')->name('seo.setting'); 
Route::post('update/seo/{id}','Backend\SeosController@update')->name('update.seo');
//social setting
Route::get('social/setting','Backend\SocialsController@index')->name('social.setting'); 
Route::post('update/social/{id}','Backend\SocialsController@update')->name('update.social');
//namaz
Route::get('namaz/setting','Backend\NamazController@index')->name('namaz.setting'); 
Route::post('update/namaz/{id}','Backend\NamazController@update')->name('update.namaz');
//tv.setting
Route::get('tv/setting','Backend\LiveTvController@index')->name('tv.setting'); 
Route::post('update/tv/{id}','Backend\LiveTvController@update')->name('update.tv');
Route::get('active/tv/{id}','Backend\LiveTvController@active')->name('active.tv'); 
Route::get('deactive/tv/{id}','Backend\LiveTvController@deactive')->name('deactive.tv'); 
//notice.setting
Route::get('notice/setting','Backend\NoticeController@index')->name('notice.setting'); 
Route::post('update/notice/{id}','Backend\NoticeController@update')->name('update.notice');
Route::get('active/notice/{id}','Backend\NoticeController@active')->name('active.notice'); 
Route::get('deactive/notice/{id}','Backend\NoticeController@deactive')->name('deactive.notice'); 
//important website important.website
Route::get('important/website','Backend\ImportantWebsiteController@index')->name('important.website'); 

Route::post('store/website','Backend\ImportantWebsiteController@store')->name('store.website');
Route::get('delete/website/{id}','Backend\ImportantWebsiteController@destroy')->name('delete.website');
Route::get('edit/website/{id}','Backend\ImportantWebsiteController@edit');
Route::post('update/website/{id}','Backend\ImportantWebsiteController@update')->name('update.website');
//photo.gallery
 Route::get('photo/gallery','Backend\PhotoController@index')->name('photo.gallery'); 
  Route::post('store/photo','Backend\PhotoController@store')->name('store.photo');
//  Route::get('all/post','Backend\PhotoController@index')->name('all.post');
Route::get('edit/photo/{id}','Backend\PhotoController@edit');
  Route::get('delete/photo/{id}','Backend\PhotoController@destroy')->name('delete.photo'); 
  Route::post('update/photo/{id}','Backend\PhotoController@update')->name('update.photo');

  //photo.gallery
 Route::get('photo/gallery','Backend\PhotoController@index')->name('photo.gallery'); 
 Route::post('store/photo','Backend\PhotoController@store')->name('store.photo');
//  Route::get('all/post','Backend\PhotoController@index')->name('all.post');
Route::get('edit/photo/{id}','Backend\PhotoController@edit');
 Route::get('delete/photo/{id}','Backend\PhotoController@destroy')->name('delete.photo'); 
 Route::post('update/photo/{id}','Backend\PhotoController@update')->name('update.photo');
 //Bangla English
 Route::get('lang/english','Frontend\LangController@english')->name('lang.english'); 
 Route::get('lang/Bangla','Frontend\LangController@bangla')->name('lang.bangla'); 

