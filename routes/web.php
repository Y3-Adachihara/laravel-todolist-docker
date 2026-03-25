<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Todolist\TodolistController;
use App\Http\Controllers\Todolist\AddTodo\AddTodoPageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('todolist', TodolistController::class)
    ->name('todolist');

Route::get('addtodo-page',AddTodoPageController::class)
    ->name('addtodo-page');

Route::put('/dumy-check/{todoId}', function ($todoId) {
    return 'todoCheckダミーです';
})->name('checktodo');

Route::delete('/dumy-delete/{todoId}', function ($todoId) {
    return 'deletetodoダミーです';
})->name('deletetodo');