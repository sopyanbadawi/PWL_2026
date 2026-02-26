<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;


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


