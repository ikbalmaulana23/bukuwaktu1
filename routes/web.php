<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;



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

Route::get('posts/{post}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user}', function (User $user) {
    return view('posts', ['title' => 'Artikel masing masing', 'posts' => $user->posts]);
});
// Route::get('authors', [AuthorController::class, 'index']);
