<?php
//all pages
Route::get('/', function () {
        return view('site.index');
});



Auth::routes();

//Admin-Panel
Route::group(['middleware' => 'auth'], function () {
    //AdminPost
//    Route::resource('admin-panel', 'DashPosts');
    Route::resource('administrator', 'Adm\DashController');
    //AdminCategory
    Route::resource('adm/categories', 'Adm\CategoriesController');

    //ArticlesControllers
    Route::get('adm/article/', 'Adm\PagesController@index')->name('article');;
    Route::get('adm/articles/{category}', 'Adm\PagesController@category')->name('category');
    Route::get('adm/articles/{category}/{post}', 'Adm\PagesController@post')->name('post');

    //Email
    Route::get('contact', 'ContactController@create')->name('contact.create');
    Route::post('contact', 'ContactController@store')->name('contact.store');
    //Profile
    Route::get('profile/{username}', [
        'as' => '{username}',
        'uses' => 'ProfileController@show',

    ]);


});

//Facebook Social
Route::get('facebook/auth', 'AuthFacebook\AuthController@redirectToProvider_facebook');
Route::get('facebook/auth/callback', 'AuthFacebook\AuthController@handleToProviderCallback_facebook');


