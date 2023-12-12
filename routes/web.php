<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// */
Route::get('/', function () {
    return view('login');
})->name('home');

Route::get('/test', function () {
    return "Hello World";
});



// register routes
Route::controller(RegisterController::class)->group(function () {
    Route::get('/signup','registerForm')->name('register.form');
    Route::post('/register','register')->name('register');
});

// login routes
Route::controller(LoginController::Class)->group(function() {
    Route::get('/signin','loginForm')->name('login.form');
    Route::post('/authenticate','authenticate')->name('authenticate');
    Route::post('/logout','logout')->name('logout');
});

Route::resource('user',UserController::class)->middleware('role:user');

// Admin Routes
Route::controller(AdminController::class)->group(function() {
    Route::get('/admin/users','users');
    Route::get('/admin/tickets','tickets');
    Route::get('/admin/log','log');
    Route::get('/admin/categories','categories');
    Route::get('/admin/labels','labels');
    // resource methods
    Route::get('/admin','index')->name('admin.index');
    Route::get('/admin/create','create')->name('admin.create');
    Route::get('/admin/edit','edit')->name('admin.edit');
    Route::get('/admin/destroy','destroy')->name('admin.destroy');

    Route::put('/admin/{admin}','update')->name('admin.update');
    Route::post('/admin/store/label','storeLabel');
    Route::post('/admin/store/category','storeCategory');
    Route::delete('/admin/category/{id}', 'deleteCategory');
    Route::delete('/admin/label/{id}','deleteLabel');

    
    Route::put('/category/update','updateCategory')->name('category.update');
    Route::put('/label/update','updateLabel')->name('label.update');
    Route::get('/logs/{id}','download');
    Route::get('/new','create');
})->middleware('role:admin');

// Route::resource('admin',AdminController::class)->middleware('role:admin');

Route::resource('agent',AgentController::class)->middleware('role:agent');
 
//Comments and replies
Route::controller(HomeController::class)->group(function() {
    Route::get('/comments', 'index')->name('comments');
    Route::get('/replies/{id}',  'replies')->name('replies');
    Route::delete('/reply/{id}','destroy')->name('reply.destroy');
    Route::post('/reply/{id}','store')->name('reply.store');
    Route::get('/ticket/mail/{id}','mail')->name('mail');
});
// Auth::routes();
