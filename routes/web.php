<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentLikeController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RetweetController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //NOTIFICATIONS
    Route::get('/notifications', [NotificationController::class, 'show']);
    //NOTIFICATIONS

    Route::post('/tweet', [TweetController::class, 'store']);
    Route::get('/{user:username}', [TweetController::class, 'index']);
    Route::get('{user:username}/status/{tweet}', [TweetController::class, 'show']);

    Route::post('/retweet', [RetweetController::class, 'store']);

    //COMMENT
    Route::get('{user:username}/status/{tweet}/comment/{comment}', [CommentController::class, 'show']);
    Route::post('/comment', [CommentController::class, 'store']);
    Route::post('/like_comment', [CommentLikeController::class, 'store']);
    Route::get('{user:username}/status/{tweet}/comment/{comment}/likes', [CommentLikeController::class, 'index'])->name('comment.likes');
    //

    Route::get('{user:username}/status/{tweet}/likes', [LikeController::class, 'index'])->name('tweet.likes');
    Route::get('{user:username}/status/{tweet}/retweets', [RetweetController::class, 'index'])->name('tweet.retweets');


    Route::post('/like', [LikeController::class, 'store']);


    Route::get('/{user:username}/followers', [FollowerController::class, 'listFollowers']);
    Route::get('/{user:username}/following', [FollowerController::class, 'listFollowing']);
    Route::post('/follow', [FollowerController::class, 'store']);
    Route::post('/unfollow', [FollowerController::class, 'destroy']);








});