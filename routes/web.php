<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\RoleController;
use App\Http\Controllers\Web\Backend\PermissionController;

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
// permission route
Route::get('/permission', [PermissionController::class, 'index'])->name('permission.index');
Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
Route::post('/permission', [PermissionController::class, 'store'])->name('permission.store');
Route::get('/permission/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
Route::post('/permission/update/{id}', [PermissionController::class, 'update'])->name('permission.update');
Route::get('/permission/destroy/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');

// role route
Route::get('/role', [RoleController::class, 'index'])->name('role.index');
Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
Route::post('/role', [RoleController::class, 'store'])->name('role.store');
Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
Route::post('/role/update/{id}', [RoleController::class, 'update'])->name('role.update');
Route::get('/role/destroy/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
Route::get('/role/{roleId}/add-permission', [RoleController::class, 'addPermissionToRole']);
Route::put('/role/{roleId}/add-permission', [RoleController::class, 'givePermissionToRole']);

Route::get('/role/{roleId}/add-permission', [RoleController::class, 'addPermissionToRole'])->name('role.addPermission');
Route::put('/role/{roleId}/add-permission', [RoleController::class, 'givePermissionToRole'])->name('role.givePermission');
