<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\createController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [createController::class,'home'])->name('home');

Route::get("/posts", [PostController::class, 'home'])->name('posts.index');

Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::middleware("auth")->group(function ()
{
    Route::get("logout", [AuthController::class, 'logout'])->name('logout');

    Route::post('posts/comment/{id}', [PostController::class, 'comment'])->name('comment');

});

Route::middleware("guest")->group(function ()
{
    Route::get("/login", [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login_process', [AuthController::class, 'login'])->name('login_process');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register_process', [AuthController::class, 'register'])->name('register_process');

    Route::get("/forgot", [AuthController::class, 'showForgotForm'])->name('forgot');
    Route::post('forgot_process', [AuthController::class, 'forgot'])->name('forgot_process');
});

Route::get('/contacts', [createController::class, 'showContactForm'])->name('contacts');
Route::post('/contact_form_process', [createController::class, 'contactForm'])->name('contact_form_process');

