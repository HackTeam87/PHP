<?php

//all pages
Route::get('/', function () {
    return view('site.index');
});

Auth::routes();
//Admin-Panel
Route::group(['middleware' => 'auth'], function (){

    //AdminPost
    Route::resource('admin-panel','DashPosts');
    //AdminCategory
    Route::resource('categories', 'CategoriesController');

    //Email
    Route::get('contact', 'ContactController@create')->name('contact.create');
    Route::post('contact', 'ContactController@store')->name('contact.store');

    //Profile
    Route::get('profile/{username}', [
        'as'   => '{username}',
        'uses' => 'ProfileController@show',
    ]);
});


//UploadFileTest
Route::get('/uploadfile','UploadController@index');
Route::post('/uploadfile','UploadController@showUploadFile');



// User Profile and Account Routes
Route::resource(
    'profile',
    'ProfileController', [
        'only' => [
            'show',
            'edit',
            'update',
            'create',
        ],
    ]
);

//Facebook Social
Route::get('facebook/auth','AuthFacebook\AuthController@redirectToProvider_facebook');
Route::get('facebook/auth/callback','AuthFacebook\AuthController@handleToProviderCallback_facebook');


Route::get('blogs/{category_id}', [
    'as' => 'blog.category', 'uses' => 'DashPosts@listByCategoryId']);


