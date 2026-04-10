<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Todolist\TodolistController;
use App\Http\Controllers\Todolist\AddTodo\AddTodoPageController;
use App\Http\Controllers\Todolist\AddTodo\AddTodoController;
use App\Http\Controllers\Todolist\EditTodo\EditTodoPageController;
use App\Http\Controllers\Todolist\EditTodo\EditTodoController;

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


    // 最初にTodo編集画面を表示させるのはこっち↓のコントローラ
Route::get('edittodo-page/{todoId}', EditTodoPageController::class)
    ->name('edittodo-page');

    // Todo編集処理で走るのはこっち↓のコントローラ
Route::put('todo/edittodo/{todoId}',  EditTodoController::class)
    ->name('edittodo')->where('todoId', '[0-9]+');




Route::put('/dumy-check/{todoId}', function ($todoId) {
    return 'todoCheckダミーです';
})->name('checktodo');

Route::delete('/dumy-delete/{todoId}', function ($todoId) {
    return 'deletetodoダミーです';
})->name('deletetodo');