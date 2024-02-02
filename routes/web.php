<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Tags;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::get('/example', function () {
    return view('example');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

require __DIR__.'/auth.php';


//Admin route group
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::post('/admin/create/task', [AdminController::class, 'adminCreateTask'])->name('admin.create.task');
    Route::get('/admin/all/tasks', [AdminController::class, 'adminAllTasks'])->name('admin.all.tasks');
    Route::get('/admin/users', [AdminController::class, 'usersPage'])->name('users.page');
    Route::get('/admin/user', [AdminController::class, 'oneUserPage'])->name('one.user.page');
    Route::get('/admin/add.categories', [AdminController::class, 'adminAddCategories'])->name('admin.add.categories');
    Route::post('/admin/create/category', [AdminController::class, 'adminCreateCategory'])->name('admin.create.category');


});

//User route group
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/tasks', [UserController::class, 'userTasks'])->name('user.tasks');
    Route::post('/user/change/status', [UserController::class, 'userChangeStatus'])->name('user.change.status');
});

Route::post('/add/tag', [TagsController::class,'addTag'])->name('add.tag');