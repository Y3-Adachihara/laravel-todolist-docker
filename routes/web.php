<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Todolist\TodolistController;
use App\Http\Controllers\Todolist\AddTodo\AddTodoPageController;
use App\Http\Controllers\Todolist\AddTodo\AddTodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('todolist', TodolistController::class)
    ->name('todolist');

    // 最初にTodo追加画面を表示させるのはこっち↓のコントローラ
Route::get('addtodo-page', AddTodoPageController::class)
    ->name('addtodo-page');

    // Todo追加処理で走るのはこっち↓のコントローラ
Route::post('todo/addtodo', AddTodoController::class)
    ->name('addtodo');

Route::put('/dumy-check/{todoId}', function ($todoId) {
    return 'todoCheckダミーです';
})->name('checktodo');

Route::delete('/dumy-delete/{todoId}', function ($todoId) {
    return 'deletetodoダミーです';
})->name('deletetodo');