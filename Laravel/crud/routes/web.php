<?php


//all pages

Route::get('/', function () {
    return view('site.index');
});



//Admin-Panel

Route::resource('admin-panel', 'DashPosts');




