<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/', function () {
    $user = null;
    if (session('user_id')){
        $user = User::find(session('user_id'));
    }
    return view('user.home', compact('user'));
});
Route::post('/add-coins',[UserController::class, 'coins']);
Route::post('/gather', [UserController::class, 'gather']);
Route::post('/user', [UserController::class, 'username']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/inventory/list', [ItemController::class, 'item']);
Route::post('/inventory/{id}/delete',[ItemController::class, 'destroy']);
Route::get('inventory/create', [ItemController::class, 'create']);
Route::post('/inventory', [ItemController::class, 'craftItems']);
Route::get('/inventory/{id}', [ItemController::class, 'show']);

