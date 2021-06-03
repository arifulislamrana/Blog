<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
    ->name('home');

Route::prefix('/admin')->group(function() {

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
        ->name('dashboard')->middleware('auth');

    Route::get('/dashboard/category', [\App\Http\Controllers\Admin\DashboardController::class, 'categories'])
        ->name('categories')->middleware('auth');

    Route::get('/dashboard/tag', [\App\Http\Controllers\Admin\DashboardController::class, 'tags'])
        ->name('tags')->middleware('auth');

    Route::get('/dashboard/admins', [\App\Http\Controllers\Admin\DashboardController::class, 'admins'])
        ->name('admins')->middleware('auth');

    Route::get('/{name}/delete', [\App\Http\Controllers\Admin\DashboardController::class, 'deleteCategory'])
        ->name('category.delete')->middleware('auth');

    Route::get('/activateCategory/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'activateCategory'])
        ->name('activateCategory')->middleware('auth');

    Route::get('/deactivateCategory/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'deactivateCategory'])
        ->name('deactivateCategory')->middleware('auth');
    
    Route::get('/test', [\App\Http\Controllers\Admin\DashboardController::class, 'test'])
        ->name('test')->middleware('auth');

    Route::get('/tag/{name}/delete', [\App\Http\Controllers\Admin\DashboardController::class, 'deleteTag'])
        ->name('tag.delete')->middleware('auth');
    
    Route::post('/create/category', [\App\Http\Controllers\Admin\DashboardController::class, 'createCategory'])
        ->name('createCategory')->middleware('auth');

    Route::get('/post/create', [\App\Http\Controllers\Admin\DashboardController::class, 'createPost'])
        ->name('createPost')->middleware('auth');

    Route::post('/create/post', [\App\Http\Controllers\Admin\DashboardController::class, 'savePost'])
        ->name('savePost')->middleware('auth');

    Route::get('/posts', [\App\Http\Controllers\Admin\DashboardController::class, 'posts'])
        ->name('posts')->middleware('auth');

    Route::get('/approve/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'approveAdminRequest'])
        ->name('approveAdminRequest')->middleware('auth');

    Route::get('/reject/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'rejectAdminRequest'])
        ->name('rejectAdminRequest')->middleware('auth');

    Route::get('/post/delete/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'deletePost'])
        ->name('deletePost')->middleware('auth');
    
    Route::get('/allPosts', [\App\Http\Controllers\Admin\DashboardController::class, 'allPosts'])
        ->name('allPosts')->middleware('auth');
    
    Route::get('/post/edit/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'editPost'])
        ->name('editPost')->middleware('auth');

    Route::post('/updatePost/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'updatePost'])
        ->name('updatePost')->middleware('auth');
});


Route::prefix('/auth')->group(function() {

    Route::get('/register', [App\Http\Controllers\Auth\AuthController::class, 'register'])
        ->name('register');
    
    Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'login'])
        ->name('login');

    Route::post('/registerpost', [App\Http\Controllers\Auth\AuthController::class, 'registerPost'])
        ->name('registerpost');

    Route::post('/loginpost', [App\Http\Controllers\Auth\AuthController::class, 'loginPost'])
        ->name('loginpost');

    Route::get('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])
        ->name('logout');
});

Route::get('/categoryblog/{id}', [\App\Http\Controllers\HomeController::class, 'categoryBlog'])
        ->name('categoryblog');

Route::get('/blogdetails/{id}', [\App\Http\Controllers\HomeController::class, 'blogDetails'])
        ->name('blogdetails');

Route::post('/postComment/{postId}', [\App\Http\Controllers\HomeController::class, 'postComment'])
        ->name('postComment');

Route::get('/tag/{id}/posts', [\App\Http\Controllers\HomeController::class, 'findPostsByTag'])
        ->name('findPostsByTag');



        