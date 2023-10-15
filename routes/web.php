<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Admin\SitemapController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RSSFeedController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PostController;
use Illuminate\Support\Facades\Route;

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

/** Client */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('post-detail');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/feed', [RSSFeedController::class, 'index'])->name('feed');
Route::post('/send-inquiry', [ContactController::class, 'sendInquiry'])->name('send_inquiry');
Route::get('/thanks', [ContactController::class, 'thanks'])->name('thanks');

/** Auth */
Route::get('/login', [AuthController::class, 'index'])->name('admin.login');
Route::post('/login-auth', [AuthController::class, 'login'])->name('admin.login-auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::prefix('ohion')->middleware('auth_admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Categories
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('list');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [CategoryController::class, 'update'])->name('update');
    });

    // Posts
    Route::prefix('post')->name('post.')->group(function () {
        Route::get('/', [AdminPostController::class, 'index'])->name('list');
        Route::get('/create', [AdminPostController::class, 'create'])->name('create');
        Route::post('/store', [AdminPostController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminPostController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [AdminPostController::class, 'update'])->name('update');
        Route::post('/upload-image', [AdminPostController::class, 'uploadImage'])->name('upload_image');
    });

    Route::get('/optimize-sitemap', [SitemapController::class, 'index'])->name('optimize_sitemap');
});
