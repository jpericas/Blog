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

Route::get('/web/{vue?}', function () {
    return view('web.index');
})->where('vue', '[\/\w\.-]*');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->middleware('auth');

Route::middleware(['auth', 'rol'])->group(function () {
    
   
    Route::get('/perfil/{nom}', function ($nom) {
        return view('perfil', ['nom' => $nom]);
    })->withoutMiddleware('auth');

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
Route::post('posts/{post}/edit/images',[App\Http\Controllers\Admin\PostsController::class,'image'])->name('post.image');

Route::resource('categories', App\Http\Controllers\Admin\CategoriesController::class);

Route::group(['prefix' => 'admin' , 'name' => 'admin.'] , function () {

    Route::get('/hola/{id}/{name}', function ($id, $nom) {
        return 'Hola '.$id.' - '.$nom.'  <a href="'.route('nosaltres', ['nom' => 'Jaume']).'" >nosaltre</a>';
    });
    
    Route::get('/documentacion-sobre-nosotros/{nom}', function ($nom) {
        return 'Nosaltres '.$nom;
    })->name('nosaltres');    

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
