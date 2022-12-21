<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TagController;
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

//HOME PAGE ROUTE
Route::get('/', [FrontendController::class, 'HomeView'])->name('home');

//ABOUT PAGE ROUTE
Route::get('/about', [FrontendController::class, 'AboutView'])->name('about');

//FRONTEND ARTICLE SHOW PAGE
Route::get('/article/{id}/', [FrontendController::class, 'ArticleView'])->name('article.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('admin')->group(function () {

    //DASHBOARD ROUTE
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //ADMIN ARTICLE ROUTES
    Route::get('article/{id}/delete', [ArticleController::class, 'delete'])->name('articles.delete');
    Route::resource('articles', ArticleController::class)->except(['destroy', 'show']);

    //ADMIN CATEGORY ROUTES
    Route::get('category/{id}/delete', [CategoryController::class, 'delete'])->name('categories.delete');
    Route::resource('categories', CategoryController::class)->except(['destroy', 'show']);

    //ADMIN TAG ROUTES
    Route::get('tag/{id}/delete', [TagController::class, 'delete'])->name('tags.delete');
    Route::resource('tags', TagController::class)->except(['destroy', 'show']);
});
