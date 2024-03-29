<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DmController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//home
Route::controller(PostController::class)->middleware(['auth'])->group(function(){ Route::get('/', 'index');
Route::get('/', 'index')->name('index');
Route::post('/posts', 'store')->name('store');
Route::get('/posts/create', 'create')->name('create');
Route::get('/posts/{post}', 'show')->name('show');
Route::put('/posts/{post}', 'update')->name('update');
Route::delete('/posts/{post}', 'delete')->name('delete'); 
Route::get('/posts/{post}/edit', 'edit')->name('edit');
});


//calendar
Route::controller(EventController::class)->middleware(['auth'])->group(function(){ Route::get('/show');
Route::get('/calendar', 'show')->name("show");
Route::post('/calendar/create', 'create')->name("create");
Route::post('/calendar/get', 'get')->name("get"); //DBに登録した予定を取得
Route::put('/calendar/update', 'update')->name("update"); // 予定の更新
Route::delete('/calendar/delete', 'delete')->name("delete");
});

//dm
Route::controller(DmController::class)->middleware(['auth'])->group(function(){ Route::get('/dm');
Route::get('/dm', 'dm')->name("dm");
Route::post('/add', 'add')->name("add");
Route::get('/result/ajax', 'getData')->name("getData");

});

Route::get('/categories/{category}', [CategoryController::class,'index']);
require __DIR__.'/auth.php';
