<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\AudiobookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoriteBookController;
use App\Http\Controllers\InterestGenreController;
use App\Http\Controllers\FavoriteAuthorController;
use App\Http\Controllers\PersonalDataController;
use App\Http\Controllers\LoungeController;
use App\Http\Controllers\LoungeCommentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ContentBadgeController;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [PostController::class, 'home'])
    ->name('index');

// Posts
Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('/posts/{post}', [PostController::class, 'post'])
    ->name('posts.show')
    ->middleware('record.content.view');

// Audiobook
Route::get('/audiobook/{audiobook}', [AudiobookController::class, 'show'])
    ->name('audiobook.show')
    ->middleware('record.content.view');

Route::resource('audiobook', AudiobookController::class)
    ->except(['show']);

// Search
Route::get('/search', [SearchController::class, 'index'])
    ->name('search');

// Genre
Route::get('/genre', [GenreController::class, 'index'])
    ->name('genre.index');

// Static Pages
Route::view('/about', 'pages.about')
    ->name('about');

Route::view('/contact', 'pages.contact')
    ->name('contact');

Route::view('/privacy-policy', 'pages.privacy-policy')
    ->name('privacy-policy');

// Authors
Route::get('/authors/{user:username}', [AuthorController::class, 'index'])
    ->name('authors');

// Lounge - Public
Route::get('/lounge', [LoungeController::class, 'index'])
    ->name('lounge.index');

// Interest Genre
Route::resource('interest-genre', InterestGenreController::class);

// Favorite Authors
Route::resource('favorite-authors', FavoriteAuthorController::class);

// Profile
Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile');


/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('user.dashboard');

    Route::get('/dashboard/posts', [DashboardController::class, 'posts']);

    Route::get('/dashboard/audiobooks', [DashboardController::class, 'audiobook']);

    Route::get('/dashboard/save', [DashboardController::class, 'save']);

    Route::get('/dashboard/baru', [DashboardController::class, 'baru']);

    Route::post('/uploadbuku', [DashboardController::class, 'uploadbuku'])
        ->name('uploadbuku');


    // Post Management
    Route::get('/posts/edit/{id}', [DashboardController::class, 'edit'])
        ->name('posts.edit');

    Route::put('/posts/update/{id}', [DashboardController::class, 'update'])
        ->name('posts.update');

    Route::get('/posts/destroy/{id}', [PostController::class, 'delete'])
        ->name('posts.destroy');


    // Comments
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])
        ->name('comments.store');

    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
        ->name('comments.destroy');


    // Lounge
    Route::post('/lounge', [LoungeController::class, 'store'])
        ->name('lounge.store');

    Route::post('/lounge/{loungePost}/comments', [LoungeCommentController::class, 'store'])
        ->name('lounge.comments.store');


    // Personal Data
    Route::get('/data-pribadi', [PersonalDataController::class, 'edit'])
        ->name('personal-data.edit');

    Route::put('/data-pribadi', [PersonalDataController::class, 'update'])
        ->name('personal-data.update');


    // Profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Legacy route
    Route::put('/profile/update', [ProfileController::class, 'update'])
        ->name('profil.update');


    // Follow / Unfollow
    Route::post('/follow/{user}', [FollowerController::class, 'follow'])
        ->name('follow');

    Route::post('/unfollow/{user}', [FollowerController::class, 'unfollow'])
        ->name('unfollow');

    Route::post('/follow1/{id}', [ProfileController::class, 'follow1'])
        ->name('follow1');

    Route::get('/follower', [FollowerController::class, 'show']);


    // Favorite Books
    Route::post('/favorite_books', [FavoriteBookController::class, 'store'])
        ->name('favorite_books.store');


    // Playlists
    Route::get('/playlists', [PlaylistController::class, 'index'])
        ->name('playlists.index');

    Route::get('/playlists/{playlist}', [PlaylistController::class, 'show'])
        ->name('playlists.show');


    // Notifications
    Route::get('/notifications/{notification}', [NotificationController::class, 'read'])
        ->name('notifications.read');

    Route::post('/notifications/read-all', [NotificationController::class, 'readAll'])
        ->name('notifications.readAll');

    Route::get('/notifications', function () {

        $user = Auth::user();

        $notifications = $user->unreadNotifications;

        $notifications->markAsRead();

        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $user->unreadNotifications()->count(),
        ]);
    });

    Route::middleware(['auth', 'role:admin'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            // Artikel
            Route::post(
                '/posts/{post}/editors-choice',
                [ContentBadgeController::class, 'storePost']
            )->name('posts.editors-choice.store');

            Route::delete(
                '/posts/{post}/editors-choice',
                [ContentBadgeController::class, 'destroyPost']
            )->name('posts.editors-choice.destroy');

            // Audiobook
            Route::post(
                '/audiobooks/{audiobook}/editors-choice',
                [ContentBadgeController::class, 'storeAudiobook']
            )->name('audiobooks.editors-choice.store');

            Route::delete(
                '/audiobooks/{audiobook}/editors-choice',
                [ContentBadgeController::class, 'destroyAudiobook']
            )->name('audiobooks.editors-choice.destroy');
        });

    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])
        ->name('logout1');
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])
        ->name('dashboard');

    Route::get('/users', [AdminController::class, 'users'])
        ->name('users');

    Route::get('/posts', [AdminController::class, 'posts'])
        ->name('posts');

    Route::get('/audiobooks', [AdminController::class, 'audiobooks'])
        ->name('audiobooks');

    Route::get('/comments', [AdminController::class, 'comments'])
        ->name('comments');
});


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
