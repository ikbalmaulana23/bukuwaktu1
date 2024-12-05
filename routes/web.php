<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\playlistController;
use App\Http\Controllers\AudiobookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoriteBookController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::get('/', [PostController::class, 'home'])->name('index');
Route::get('posts', [PostController::class, 'index']);
Route::post('/quotes/refresh', [PostController::class, 'refreshQuote'])->name('quotes.refresh');
Route::get('genre', [GenreController::class, 'index']);
Route::get('posts/edit/{id}', [DashboardController::class, 'edit'])->name('posts.edit');
Route::put('posts/update/{id}', [DashboardController::class, 'update'])->name('posts.update');
Route::get('posts/destroy/{id}', [PostController::class, 'delete'])->name('posts.destroy');
Route::get('authors/{user:username}', [AuthorController::class, 'index']);
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'daftar'])->name('register');
Route::post('register.post', [AuthController::class, 'register'])->name('register.post');
Route::post('login.post', [AuthController::class, 'login'])->name('login.post');
Route::resource('audiobooks', AudiobookController::class);
// Route::get('/authors/{user:username}', function (User $user) {
//     return view('category', ['title' =>  count($user->posts) . ' Artikel by ' . $user->name, 'posts' => $user->posts]);
// });
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', ['title' =>  'Category : ' . $category->name, 'posts' => $category->posts]);
});
Route::get('posts/{post}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::middleware('user')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/posts', [DashboardController::class, 'posts']);
    Route::get('/dashboard/audiobooks', [DashboardController::class, 'audiobook']);
    Route::get('/dashboard/save', [DashboardController::class, 'save']);
    Route::get('/dashboard/baru', [DashboardController::class, 'baru']);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/follow/{user}', [FollowerController::class, 'follow'])->name('follow');
    Route::post('/unfollow/{user}', [FollowerController::class, 'unfollow'])->name('unfollow');
    Route::post('/follow1/{id}', [ProfileController::class, 'follow1'])->name('follow1');
    Route::get('/follower', [FollowerController::class, 'show']);
    Route::post('/uploadbuku', [DashboardController::class, 'uploadbuku'])->name('uploadbuku');
    Route::post('/favorite_books', [FavoriteBookController::class, 'store'])->name('favorite_books.store');
    Route::get('/playlists', [playlistController::class, 'index'])->name('playlists.index');
    Route::get('/playlists/{playlist}', [playlistController::class, 'show'])->name('playlists.show');
    Route::get('/notifications', function () {
        $notifications = Auth::user()->unreadNotifications;

        // Tandai sebagai telah dibaca
        Auth::user()->unreadNotifications->markAsRead();

        return response()->json([
            'notifications' => $notifications,
            'unread_count' => Auth::user()->unreadNotifications->count(),
        ]);
    });

    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});
