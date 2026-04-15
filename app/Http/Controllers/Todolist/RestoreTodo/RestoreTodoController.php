<?php

namespace App\Http\Controllers\Todolist\RestoreTodo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todolist;

class RestoreTodoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $todoId = $request->route('todoId');
        $todo = Todolist::where('id', $todoId)->firstOrFail();
        $todo->status = 0;
        $todo->save();
        return redirect()->route('restoretodo-page');
    }
}
