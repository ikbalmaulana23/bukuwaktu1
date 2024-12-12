<?php

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\playlistController;
use App\Http\Controllers\AudiobookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoriteBookController;
use App\Http\Controllers\InterestGenreController;
use App\Http\Controllers\FavoriteAuthorController;


Route::get('/dashboard', function () {
    return view('dashboarcd');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::resource('audiobooks', AudiobookController::class);
Route::resource('interest-genre', InterestGenreController::class);
Route::resource('favorite-authors', FavoriteAuthorController::class);

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profil.update');

Route::get('/', [PostController::class, 'home'])->name('index');
Route::get('posts', [PostController::class, 'index']);
Route::get('genre', [GenreController::class, 'index']);
Route::get('posts/edit/{id}', [DashboardController::class, 'edit'])->name('posts.edit');
Route::put('posts/update/{id}', [DashboardController::class, 'update'])->name('posts.update');
Route::get('posts/destroy/{id}', [PostController::class, 'delete'])->name('posts.destroy');
Route::get('authors/{user:username}', [AuthorController::class, 'index']);
Route::get('posts/{post}', [PostController::class, 'post'])->name('show.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout1');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/posts', [DashboardController::class, 'posts']);
Route::get('/dashboard/audiobooks', [DashboardController::class, 'audiobook']);
Route::get('/dashboard/save', [DashboardController::class, 'save']);
Route::get('/dashboard/baru', [DashboardController::class, 'baru']);
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

require __DIR__ . '/auth.php';



// Route::get('login', [AuthController::class, 'index'])->name('login');
// Route::get('register', [AuthController::class, 'daftar'])->name('register');
// Route::post('register.post', [AuthController::class, 'register'])->name('register.post');
// Route::post('login.post', [AuthController::class, 'login'])->name('login.post');
