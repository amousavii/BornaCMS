<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Photo;

Route::get('/', function () {
    return view('front.index');
});

Route::post('/login' ,['as'=>'admin.login' , 'uses'=>'AuthUsers@login']);
Route::get('logout',function (){
    Sentinel::logout();
});
Route::get('test/{id}',function ($id){
    Photo::findOrFail($id)->delete();
});
Route::group(['middleware'=>['web','admin']],function() {


    Route::get('admin', function () {
        return view('admin.index');
    });

    Route::resource('admin/users', 'AdminUsersController');
    Route::get('admin/roles', 'AdminUsersController@roleIndex');
    Route::get('admin/roles/create', 'AdminUsersController@roleCreate');
    Route::post('admin/roles/create', [
        'uses' => 'AdminUsersController@roleStore',
        'as' => 'admin.create.role'
    ]);

    Route::resource('admin/posts' , 'AdminPostsController');
    Route::resource('admin/categories' , 'AdminCategoriesController');



});
