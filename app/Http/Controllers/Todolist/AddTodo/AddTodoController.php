<?php

namespace App\Http\Controllers\Todolist\AddTodo;

use App\Http\Controllers\Controller;
use App\Models\Todolist;
use App\Http\Requests\Todolist\AddTodoRequest;

class AddTodoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AddTodoRequest $request)
    {
        $todo = new Todolist();
        $todo->user_id = $request->userId();
        $todo->content = $request->content();
        $todo->deadline = $request->deadline();
        $todo->save();
        return redirect()->route('todolist');
    }
}
