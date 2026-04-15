<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Todolist\TodolistController;
use App\Http\Controllers\Todolist\AddTodo\AddTodoPageController;
use App\Http\Controllers\Todolist\AddTodo\AddTodoController;
use App\Http\Controllers\Todolist\EditTodo\EditTodoPageController;
use App\Http\Controllers\Todolist\EditTodo\EditTodoController;
use App\Http\Controllers\Todolist\DeleteTodo\DeleteTodoController;
use App\Http\Controllers\Todolist\CheckTodoController;
use App\Http\Controllers\Todolist\RestoreTodo\RestoreTodoPageController;

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
    /*
        パラメータをチェックし、正常なときのみこのルートを許可する = ルートパラメータの制約

        第一引数はURLパラメータ名。今回なら、パラメータが{todoId}となっているのでtodoIdを指定。
        [0-9]+ は、受け付けるパラメータの値を指定する正規表現。0~9の数字が一文字以上続くという意味。（3,11,6423など）
        目的：
        ①悪意のあるユーザが/DROP_TABELEなどセキュリティ的にやばい文字列を受け取ったとしても、予期せぬシステムエラーやDBエラーを防ぐ。
        ②コントローラに余計な仕事をさせずに済む。こっちで簡単に判定させたほうがコード量も少なく済む。
        ③防がれた場合、404エラーとして処理できる。サーバ側の問題（500など）として処理されることを防ぐ。
    */

Route::delete('todo/delete/{todoId}', DeleteTodoController::class)
    ->name('deletetodo')->where('todoId', '[0-9]+');

Route::put('todo/checktodo/{todoId}', CheckTodoController::class)
    ->name('checktodo')->where('todoId', '[0-9]+');

Route::get('resttodo-page',RestoreTodoPageController::class)
    ->name('resttodo-page');