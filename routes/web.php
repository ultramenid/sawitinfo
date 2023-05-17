<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CmsPagesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InthenewsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SettingsController;
use App\Http\Livewire\CmspostsComponent;
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


Route::redirect('/', '/en');

// frontend
Route::group(['prefix' => '{lang}'], function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('/detail', [DetailController::class, 'index'])->name('detail');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/posts/{slug}', [PostsController::class, 'slug'])->name('slug');
});

//backend
Route::group(['middleware' => 'checkSession'], function () {
    Route::get('/cms/dashboard', [DashboardController::class, 'index']);
    Route::get('/cms/settings', [SettingsController::class, 'index']);
    Route::get('/cms/posts', [PostsController::class, 'index']);
    Route::get('/cms/addposts', [PostsController::class, 'add']);
    Route::get('/cms/posts/{id}', [PostsController::class, 'edit']);
    Route::get('/cms/pages/whoweare', [CmsPagesController::class, 'whoweare']);
    Route::get('/cms/pages/sawitinfo', [CmsPagesController::class, 'sawitinfo']);
    Route::get('/cms/inthenews', [InthenewsController::class, 'index']);
    Route::get('/cms/reports', [ReportsController::class, 'cmsreports']);
    Route::get('/cms/addnews', [InthenewsController::class, 'addnews']);
    Route::get('/cms/addreports', [ReportsController::class, 'addreports']);
    Route::get('/cms/news/{id}', [InthenewsController::class, 'edit']);
    Route::get('/cms/reports/{id}', [ReportsController::class, 'edit']);

    Route::group(['prefix' => '/cms/sawit-filemanager', 'middleware' => 'checkSession'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

});


//if there is no session , redirect to login page
Route::group(['middleware' => 'hasSession'], function () {
    Route::get('cms/login', [LoginController::class, 'index'])->name('login');
});

//route logout
Route::get('/cms/page/logout', function () {
    session()->flush();
    return redirect('/cms/login');
});

Route::any('{query}', function() { return redirect('/'); })->where('query', '.*');
