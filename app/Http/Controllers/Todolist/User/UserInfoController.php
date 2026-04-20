<?php

namespace App\Http\Controllers\Todolist\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        return view('todo.userinfo')->with(['name' => $user->name, 'email' => $user->email]);
    }
}
