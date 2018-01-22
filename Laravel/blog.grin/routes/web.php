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
    Route::resource('admin-panel', 'Adm\DashController');
    //AdminCategory
    Route::resource('categories', 'Adm\CategoriesController');

    //ArticlesControllers
    Route::get('/articles', 'Adm\PagesController@index');
    Route::get('/articles/{category}', 'Adm\PagesController@category')->name('category');
    Route::get('/articles/{category}/{post}', 'Adm\PagesController@post')->name('post');

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



Route::get('/administrator/', function () {
    return view('layouts.cms.admin');
});

//    //IsAdmin
//
//    Route::get('admin', ['articles' => 'PagesController@index', 'as' => 'admin'])->middleware('admin');



////UploadFileTest
//Route::get('/uploadfile', 'UploadController@index');
//Route::post('/uploadfile', 'UploadController@showUploadFile');
//// User Profile and Account Routes
//Route::resource(
//    'profile',
//    'ProfileController', [
//        'only' => [
//            'show',
//            'edit',
//            'update',
//            'create',
//        ],
//    ]
//);
////Facebook Social
//Route::get('facebook/auth', 'AuthFacebook\AuthController@redirectToProvider_facebook');
//Route::get('facebook/auth/callback', 'AuthFacebook\AuthController@handleToProviderCallback_facebook');
//Route::get('blogs/{category_id}', [
//    'as' => 'blog.category', 'uses' => 'DashPosts@listByCategoryId']);