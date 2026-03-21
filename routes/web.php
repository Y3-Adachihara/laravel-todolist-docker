<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Todolist\TodolistController;

Route::get('/', function () {
    return view('welcome');
});

ROute::get('todolist', TodolistController::class)
    ->name('todolist');