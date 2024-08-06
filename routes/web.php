<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('posts', function () {

    //pencarian dengan local scope
    return view('posts', ['title' => 'Blog', 'posts' => Post::filter(request(['search', 'category']))->latest()->get()]);
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

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'daftar'])->name('register');
Route::post('register.post', [AuthController::class, 'register'])->name('register.post');
Route::post('login.post', [AuthController::class, 'login'])->name('login.post');


Route::middleware('user')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});
