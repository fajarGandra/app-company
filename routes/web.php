<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\CaroseulController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\TeamController;


use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ArticlesController;
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
    return view('frontend.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminController::class, 'index'])->name('login_form');
    Route::get('/register', [AdminController::class, 'registerForm'])->name('register_form');
    Route::post('/login/owner', [AdminController::class, 'login'])->name('users.login');
    Route::get('/dashboard', [IndexController::class, 'index'])->name('users.dashboard');
});

Route::middleware('admin')->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class)->middleware('admin');
    Route::post('/roles/{role}/store', [RoleController::class, 'storePermission'])->name('roles.permission.store');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.remove-permission');

    Route::resource('/permissions', PermissionController::class)->middleware('admin');
    Route::post('/permissions/{permission}/menu', [PermissionController::class, 'givePermissionMenu'])->name('permissions.menu');
    Route::delete('/permissions/{permission}/remove-permission', [PermissionController::class, 'removePermission'])->name('permissions.remove-permission');


    Route::resource('/users', UserAdminController::class);
    Route::post('/users/{user}/roles', [UserAdminController::class, 'assignRole'])->name('users.assign-roles');
    Route::delete('/users/{user}/roles/{role}', [UserAdminController::class, 'deleteRole'])->name('users.delete-roles');

    Route::resource('/menu', MenuController::class);
    Route::get('/menu-list', [MenuController::class, 'list'])->name('menu.list');
    Route::get("/menu/{id}/add", [MenuController::class, 'create'])->name('menu.getCreate');
    Route::get("/menu/{id}/edit", [MenuController::class, 'create'])->name('menu.getEdit');
    Route::put("/menu/drag/update-sequence", [MenuController::class, 'updateSequence'])->name('menu.update-sequence');
    
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    
    Route::resource('/tags', TagController::class);
    Route::resource('/article', ArticleController::class);

    Route::resource('/caroseul', CaroseulController::class);
    Route::resource('/clients', ClientController::class);
    Route::resource('/teams', TeamController::class);

    Route::resource('/profile', ProfileController::class);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/change-password/{id}', [ProfileController::class, 'changePassword'])->name('profile.change-password');

    

});

Route::name('article.')->group(function ()
{
    Route::get('/articles', [ArticlesController::class, 'index'])->name('article.index');
    Route::get('/articles/{slug}', [ArticlesController::class, 'detail'])->name('categories.detail');
});

require __DIR__.'/auth.php';
