<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PhotoController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello';
});

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('world', function() {
    return 'World';
});

//No. 6
Route::get('/', function() {
    return "Selamat Datang";
});

//No. 7
Route::get('/about', function() {
    return "NIM : 244107020073 <br> Nama : Ahmad Sofyan Badawi";
});


Route::get('/user/{name}', function ($name) {
    return "Nama : ". $name;
});

Route::get('/posts/{post}/comments/{comment}', function($postId, $commentId) {
    return "Pos ke-" . $postId . "Komentar ke-:" . $commentId;
});

//No. 13    
Route::get('articles/{id}', function($id) {
    return "Halaman Artikel dengan ID " . $id;
});

Route::get('/user/{name?}', function ($name = null) {
    return "Nama : " . $name;
});

Route::get('/user/{name?}', function($name = 'John') {
    return "Nama : " . $name;
});


Route::get('/user/profile', function() {
    //
}) ->name('profile');


Route::get('/user/profile', [UserController::class, 'show']

) -> name('profile');

Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        // Uses first & second middleware...
    });

Route::get('/user/profile', function () {
        // Uses first & second middleware...
    });
});

Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});

Route::middleware('auth')->group(function () {
	Route::get('/user', [UserController::class, 'index']);
	Route::get('/post', [PostController::class, 'index']);
	Route::get('/event', [EventController::class, 'index']);
	
});

Route::prefix('admin')->group(function () {
	Route::get('/user', [UserController::class, 'index']);
	Route::get('/post', [PostController::class, 'index']);
	Route::get('/event', [EventController::class, 'index']);

});


//Praktikum 2
Route::get('/hello', [WelcomeController::class, 'hello'] );
//6 Modifikasi
Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/articles/{id}', [PageController::class, 'articles']);


//7 Modifikasi
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/articles/{id}', [ArticleController::class, 'index']);


Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);


Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);

//Praktikum 3
Route::get('/greeting', function() {
    return view('hello', ['name' => 'Andi']);
});


Route::get('/greeting', function() {
    return view('blog.hello', ['name' => 'Andi']);
});

Route::get('/greeting', [WelcomeController::class, 'greeting']);


