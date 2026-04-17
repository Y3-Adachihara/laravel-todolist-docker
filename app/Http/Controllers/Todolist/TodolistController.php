<?php

namespace App\Http\Controllers\Todolist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todolist;

class TodolistController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user_id = Auth::id();
        $user_name = Auth::user()=>name;
        $todolists = Todolist::where([['user_id', '=', $user_id], ['status', '=', 0]])->get();
        return view('todolist.todolist')->with([
            'user_name' => $user_name,
            'todolists' => $todolists
        ]);
    }
}
