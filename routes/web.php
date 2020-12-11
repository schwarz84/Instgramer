<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// use App\Image;

Route::get('/', function () {

    // $images = Image::all();

    // foreach ($images as $image) {
    //     echo $image->image_path . '<br>';
    //     echo $image->description . '<br>';
    //     echo $image->user->name . ' ' . $image->user->surname . '<br>';

    //     if(count($image->comments) >=1 ){
    //         echo '<h4>Comentarios</h4>';
    //         foreach($image->comments as $comentarios) {
    //             echo $comentarios->user->name . ' ' . $comentarios->user->surname . ': ';
    //             echo $comentarios->content . '<br>';
    //         }
    //     }

    //     echo count($image->likes);
    //     echo '<hr/>';

    // }


    // die();
    return view('welcome');
});

// Generales
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

// UserController
Route::get('/configuracion', 'UserController@config')->name('config');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::get('/perfil/{user}', 'UserController@profile')->name('profile');
Route::get('/gente/{search?}', 'UserController@index')->name('user.index');

Route::post('/user/update', 'UserController@update')->name('user.update');

// ImageController
Route::get('/subir-imagen', 'ImageController@create')->name('subir.imagen');
Route::get('/image/file/{filename}', 'ImageController@getImages')->name('image.file');
Route::get('/image/{id}', 'ImageController@detail')->name('image.detail');
Route::get('/image/delete/{id}', 'ImageController@delete')->name('image.delete');
Route::get('/image/edit/{id}', 'ImageController@edit')->name('image.edit');

Route::post('/subir/save', 'ImageController@save')->name('image.save');
Route::post('/image/update', 'ImageController@update')->name('image.update');

// CommentController
Route::get('/comment/delete/{id}', 'CommentController@delete')->name('comment.delete');

Route::post('/comment/save', 'CommentController@save')->name('comment.save');

// LikeController
Route::get('/like/{image_id}', 'LikeController@like')->name('like.save');
Route::get('/dislike/{image_id}', 'LikeController@dislike')->name('like.delete');
Route::get('/like', 'LikeController@index')->name('like');
