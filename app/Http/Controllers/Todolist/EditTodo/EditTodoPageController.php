<?php

namespace App\Http\Controllers\Todolist\EditTodo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todolist;

class EditTodoPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $todoId = (int) $request->route('todoId');
        $todo = Todolist::where('id', $todoId)->firstOrFail();
        return view('todolist.edittodo')->with('todo', $todo);
    }
}
