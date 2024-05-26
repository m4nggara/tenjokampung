<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Authenticate;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/discover', function () {
    return view('discover');
})->name('discover');

Route::get('/product', [ProductController::class, 'list'])->name('product');

Route::get('/destination', function () {
    return view('destination');
})->name('destination');

Route::match(['post', 'get'], '/search', function (Request $request) {
    $term = $request->term;
    return view('search', ['term' => $term]);
})->name('search');

// Route::post('/detail', function (Request $request) {
//     $slug = $request->slug;
//     return view('detail', ['slug' => $slug]);
// })->name('detail');
Route::match(['GET', 'POST'],'/detail/{slug}', [ItemsController::class, 'show'])->name('detail');


Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware(Authenticate::class);
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('admin')->as('admin.')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');
        Route::resource('items', ItemsController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('users', UsersController::class);
        Route::resource('roles', RolesController::class);
        Route::prefix('profile')->as('profile.')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('index');
            Route::post('/', [ProfileController::class, 'edit'])->name('edit');
            Route::get('/settings', [ProfileController::class, 'setting'])->name('setting');
            Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('password.update');
        });
    });
});


