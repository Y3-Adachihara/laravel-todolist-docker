<?php

namespace App\Http\Controllers\Todolist\AddTodo;

use App\Http\Controllers\Controller;
use App\Models\Todolist;
use App\Http\Requests\Todolist\AddTodoRequest;

class AddTodoController extends Controller
{
    /**
     * Handle the incoming request.
     * AddTodoRequest $requestとすると、ユーザがフォームを送信した瞬間、Laravelが自動的にAddTodoRequestのインスタンスを生成
     */
    public function __invoke(AddTodoRequest $request)
    {
        // モデルをインスタンス化すると、Todolistテーブル用の一行分の空データが生成される。
        $todo = new Todolist();
        $todo->user_id = $request->userId();
        $todo->content = $request->content();
        $todo->deadline = $request->deadline();
        $todo->save();
        return redirect()->route('todolist');
    }
}
