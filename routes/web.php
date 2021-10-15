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


Route::get('/perfil/{nom}', function ($nom) {
    return view('perfil', ['nom' => $nom]);
});

Route::get('/user/{user}', function (App\Models\User  $user) {
    dd($user);
    return $user;
});
/*
Route::get('/posts/{post:url_clean}', function (App\Models\Posts  $post) {
    return $post->content;
});*/

Route::resource('posts', App\Http\Controllers\Admin\PostsController::class);

Route::group(['prefix' => 'admin' , 'name' => 'admin.'] , function () {

    Route::get('/hola/{id}/{name}', function ($id, $nom) {
        return 'Hola '.$id.' - '.$nom.'  <a href="'.route('nosaltres', ['nom' => 'Jaume']).'" >nosaltre</a>';
    });
    
    Route::get('/documentacion-sobre-nosotros/{nom}', function ($nom) {
        return 'Nosaltres '.$nom;
    })->name('nosaltres');    

});

