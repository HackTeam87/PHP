<?php


//all pages

Route::get('/', function () {
    return view('site.index');
});



//Admin-Panel

Route::resource('admin-panel','DashPosts');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/cat', 'CategoriesController@index');


//



Route::get('/uploadfile','UploadController@index');
Route::post('/uploadfile','UploadController@showUploadFile');


