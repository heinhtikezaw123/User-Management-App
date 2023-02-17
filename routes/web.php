<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\OtherUserController;

Route::redirect('/', 'loginPage', 301);
Route::get('loginPage',[AuthController::class,'loginPage'])->name('auth#loginPage');

//dashboard
Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');

Route::prefix('admin')->group(function () {

    //admin user list
    Route::get('userList',[AdminUserController::class,'userList'])->name('admin#userList');

    //create new user
    Route::get('addUserPage',[AdminUserController::class,'addUserPage'])->name('admin#addUserPage');
    Route::post('addUser',[AdminUserController::class,'addUser'])->name('admin#addUser');
    //view user
    Route::get('ViewUserPage/{id}',[AdminUserController::class,'ViewUserPage'])->name('admin#ViewUserPage');
    //edit user
    Route::get('editUserPage/{id}',[AdminUserController::class,'eidtUserPage'])->name('admin#editUserPage');
    Route::post('editUser',[AdminUserController::class,'eidtUser'])->name('admin#editUser');
    //delete user
    Route::get('deleteUser/{id}',[AdminUserController::class,'deleteUser'])->name('admin#deleteUser');

    //for Roles
    //role lists
    Route::get('roleList',[RoleController::class,'roleList'])->name('admin#roleList');
    Route::get('addRole/page',[RoleController::class,'addRolePage'])->name('admin#addRolePage');
    Route::post('addRole',[RoleController::class,'addRole'])->name('admin#addRole');
    Route::get('editRolePage/{id}',[RoleController::class,'editRolePage'])->name('admin#editRolePage');
    Route::post('editRole',[RoleController::class,'editRole'])->name('admin#editRole');
    Route::get('deleteRole/{id}',[RoleController::class,'deleteRole'])->name('admin#deleteRole');
});








