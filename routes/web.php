<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => Post::all()]);
});

Route::get('about', function () {
    return view('about', ['title' => 'About', 'nama' => 'ikbal maulana']);
});

Route::get('contact', function () {
    return view('contact', ['title' => 'Contact']);
});

Route::get('posts/{post}', [PostController::class, 'index'])->name('index');
