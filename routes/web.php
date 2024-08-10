<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('posts', [PostController::class, 'index']);

// Route::get('posts', function () {
//     return view('posts', ['title' => 'Blog', 'posts' => Post::filter(request(['search', 'category']))->latest()->get()]);
// });

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
    Route::post('/follow/{user}', [FollowerController::class, 'follow'])->name('follow');
    Route::post('/unfollow/{user}', [FollowerController::class, 'unfollow'])->name('unfollow');
    Route::get('/follower', [FollowerController::class, 'show']);
    Route::post('/uploadbuku', [DashboardController::class, 'uploadbuku'])->name('uploadbuku');
    Route::get('/notifications', function () {
        $notifications = Auth::user()->unreadNotifications;

        // Tandai sebagai telah dibaca
        Auth::user()->unreadNotifications->markAsRead();

        return response()->json([
            'notifications' => $notifications,
            'unread_count' => Auth::user()->unreadNotifications->count(),
        ]);
    });
});
