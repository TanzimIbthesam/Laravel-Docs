<?php

use App\Http\Controllers\BlogCommentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\BlogTagController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/',[BlogController::class,'index']);

Route::get('/blog-post/{id}/{welcome?}', function ($id, $welcome = 2) {
    $pages = [
        1 => [
            'title' => 'from page 1',
        ],
        2 => [
            'title' => 'from page 2',
        ],
    ];
    $welcomes = [1 => '<b>Hello</b> ', 2 => 'Welcome to '];

    return view('blog-post', [
        'data' => $pages[$id],
        'welcome' => $welcomes[$welcome],
    ]);
});
//named routes
// If suppose we are to change a route we should name it because while providing links in a menu


Route::get('users/{id}', function ($id) {

});
Route::get('blogs/tag/{tag}',[BlogTagController::class,'index'])->name('blogs.tags.index');

Route::resource('/customers',CustomerController::class);

Route::resource('/blogs',BlogController::class);

Route::get('/contact', [ContactController::class,'index'])->name('contact')
->middleware('can:blogs.contact')
;
Route::get('/secret', [ContactController::class,'secret'])->name('secret')
->middleware('can:contact.secret')
;
Route::resource('blogs.comment', BlogCommentController::class)->only(['store']);
// Route::view('/home', 'home')->middleware('auth');

