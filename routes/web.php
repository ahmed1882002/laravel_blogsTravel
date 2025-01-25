<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('theme.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



Route::controller(ThemeController::class)->name('theme.')->group(function () {

    Route::get('/', 'index')->name('index');
    Route::get('/category{id}', 'category')->name('category');
    Route::get('/contact', 'contact')->name('contact');
    // Route::get('/login', 'login')->name('login');
    // Route::get('/register', 'register')->name('register');
});
// Route::get('/singelblog', [BlogController::class,'show'])->name('singelbloge');


Route::post('/subscriber/store', [SubscriberController::class, 'store'])->name('subscriber.store');
Route::post('/subscriber2/store', [SubscriberController::class, 'store2'])->name('subscriber.store2');
Route::post('/contact_store', [ContactController::class, 'store_contact'])->name('contact.store');

//route resource
Route::resource('blogs', BlogController::class);

Route::get('/my-blogs', [BlogController::class, 'myBlogs'])->name('blogs.my-blogs');
Route::post('/comments/store', [CommentController::class, 'storeComment'])->name('comments.store');




//php artisan make:controller BlogController --resource --model=Blog//