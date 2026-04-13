<?php

namespace App\Http\Controllers\Todolist\DeleteTodo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todolist;

class DeleteTodoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $todoId = $request->route('todoId');
        $todo = Todolist::where('id', $todoId)->firstOrFail();
        $todo->delete();
        return redirect()->route('todolist');
    }
}
