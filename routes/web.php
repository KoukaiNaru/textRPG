<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/', function () {
    $user = User::latest()->first();
    return view('user.home', compact('user'));
});
Route::post('/user', [UserController::class, 'username']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/inventory/list', [ItemController::class, 'item']);
Route::get('inventory/create', [ItemController::class, 'create']);
Route::post('/inventory', [ItemController::class, 'store']);
Route::get('/inventory/{id}', [ItemController::class, 'show']);

