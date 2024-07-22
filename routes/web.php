<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;



Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('posts', function () {
    $posts = Post::latest();
    if (request('search')) {
        $posts->where('title', 'like', '%' . request('search', '%'));
    }
    return view('posts', ['title' => 'Blog', 'posts' => $posts->get()]);
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

Route::get('/authors/{user:username}', function (User $user) {
    return view('posts', ['title' =>  count($user->posts) . ' Artikel by ' . $user->name, 'posts' => $user->posts]);
});
// Route::get('authors', [AuthorController::class, 'index']);

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', ['title' =>  'Category : ' . $category->name, 'posts' => $category->posts]);
});
