<?php

use App\Http\Controllers\AdminCategoryController;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'title' => 'Home',
        'active' => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'active' => 'about',
        'title'=> 'About',
        "name" => "Depsheeshh",
        "NIM" => "20231050009",
        "email" => "famspems@gmail.com",
        "image" => "profile.jpg"
    ]);
});



Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories' , function() {
    return view('categories', [
        'title' => 'Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::get('/dashboard', fn() => view('dashboard.index'))->middleware('auth');
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/dashboard/posts', DashboardPostController::class);

Route::get('/dashboard/post/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard', [DashboardPostController::class, 'showDashboard'])->middleware('auth');
