<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Middleware\AdminMiddleware;


Route::redirect('/', 'posts');
Route::resource('posts', PostController::class);

Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::middleware('auth')->group(function() {
    Route::prefix('admin')->name('admin.')->middleware('auth')->group(function ()
    {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('users', AdminUserController::class)->except(['show']);
        Route::resource('posts', AdminPostController::class)->except(['show']);
        Route::get('posts-check', [AdminPostController::class, 'index']);
    });

    //
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function(){
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});


Route::get('/{user}/posts',
[DashboardController::class, 'userPosts'])->name('posts.user');

Route::get('/logout', function(){
    return redirect()->route('posts.index');
});