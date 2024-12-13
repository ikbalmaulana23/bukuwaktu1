<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AudiobookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoriteAuthorController;
use App\Http\Controllers\FavoriteBookController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\InterestGenreController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Dashboard Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/posts', [DashboardController::class, 'posts']);
    Route::get('/dashboard/audiobooks', [DashboardController::class, 'audiobook']);
    Route::get('/dashboard/save', [DashboardController::class, 'save']);
    Route::get('/dashboard/baru', [DashboardController::class, 'baru']);
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


// Profile Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/auth-profile', [AuthProfileController::class, 'edit'])->name('auth.profile.edit');
    Route::patch('/auth-profile', [AuthProfileController::class, 'update'])->name('auth.profile.update');
    Route::delete('/auth-profile', [AuthProfileController::class, 'destroy'])->name('auth.profile.destroy');
});

// Post Routes
Route::get('/', [PostController::class, 'home'])->name('index');
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'post'])->name('show.post');
Route::get('/posts/edit/{id}', [DashboardController::class, 'edit'])->name('posts.edit');
Route::put('/posts/update/{id}', [DashboardController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'delete'])->name('posts.destroy');

// Genre & Author Routes
Route::get('/genre', [GenreController::class, 'index']);
Route::get('/authors/{user:username}', [AuthorController::class, 'index']);

// Audiobooks, Interest Genre, and Favorite Authors CRUD
Route::resource('audiobooks', AudiobookController::class);
Route::resource('interest-genre', InterestGenreController::class);
Route::resource('favorite-authors', FavoriteAuthorController::class);

// Playlist Routes
Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index');
Route::get('/playlists/{playlist}', [PlaylistController::class, 'show'])->name('playlists.show');

// Comment Routes
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

// Follower Routes
Route::post('/follow/{user}', [FollowerController::class, 'follow'])->name('follow');
Route::post('/unfollow/{user}', [FollowerController::class, 'unfollow'])->name('unfollow');
Route::get('/follower', [FollowerController::class, 'show']);

// Favorite Books
Route::post('/favorite_books', [FavoriteBookController::class, 'store'])->name('favorite_books.store');

// Notifications
Route::get('/notifications', function () {
    $notifications = Auth::user()->unreadNotifications;
    Auth::user()->unreadNotifications->markAsRead();

    return response()->json([
        'notifications' => $notifications,
        'unread_count' => Auth::user()->unreadNotifications->count(),
    ]);
});

// Logout
// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Auth Routes
require __DIR__ . '/auth.php';
