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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/' , '\App\Http\Controllers\Frontend\MainController@index');
Route::get('about' , '\App\Http\Controllers\Frontend\MainController@about')->name('frontend.posts.about');

Route::get('posts/{slug}' , '\App\Http\Controllers\Frontend\PostController@show')->name('frontend.posts.show');
Route::get('search' , '\App\Http\Controllers\Frontend\PostController@searchTitle')->name('frontend.posts.search');

Route::group(['middleware'=>'Admin'] , function (){
    Route::resource('users' ,\App\Http\Controllers\Admin\AdminUserController::class );
    Route::resource('posts' ,\App\Http\Controllers\Admin\AdminPostController::class );
    Route::resource('categories' ,\App\Http\Controllers\Admin\AdminCategoryController::class );
    Route::resource('photos' ,\App\Http\Controllers\Admin\AdminPhotoController::class );
    Route::get('comments' , '\App\Http\Controllers\Admin\AdminCommentController@index')->name('comments.index');
    Route::patch('comments/{id}' , '\App\Http\Controllers\Admin\AdminCommentController@index@edit')->name('comments.edit');
    Route::get('dashboard' , '\App\Http\Controllers\Admin\AdminDashboardController@index')->name('dashboard.index');

});








