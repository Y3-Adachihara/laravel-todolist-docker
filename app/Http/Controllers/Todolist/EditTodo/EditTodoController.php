<?php

namespace App\Http\Controllers\Todolist\EditTodo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Todolist\EditTodoRequest;
use App\Models\Todolist;

class EditTodoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(EditTodoRequest $request)
    {
        $todoId = $request->todoId();
        $todo = Todolist::where('id', $todoId)->firstOrFail();
        $todo->content = $request->content();
        $todo->deadline = $request->deadline();
        $todo->save();
        return redirect()->route('todolist');
    }
}
