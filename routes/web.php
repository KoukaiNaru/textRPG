<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;

// use App\Http\Controllers\ItemController;
// use App\Http\Controllers\UserController;
// use App\Models\User;
// use Illuminate\Support\Facades\Route;

// Главная страница (контроллер пользователя)
Route::get('/', [UserController::class, 'home'])->name('home');

// Маршруты пользователя
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/username', [UserController::class, 'username'])->name('username');
Route::post('/coins', [UserController::class, 'coins'])->name('coins');

// Маршруты инвентаря/предметов (группировка для удобства)
Route::prefix('inventory')->name('inventory.')->group(function () {
    // Список предметов
    Route::get('/list', [ItemController::class, 'item'])->name('list');

    // Страница создания предмета
    Route::get('/create', [ItemController::class, 'create'])->name('create');
    Route::post('/', [ItemController::class, 'store'])->name('store');
    // Просмотр и удаление конкретного предмета
    Route::get('/{id}', [ItemController::class, 'show'])->name('show');
    Route::delete('/{id}', [ItemController::class, 'destroy'])->name('destroy');
});
