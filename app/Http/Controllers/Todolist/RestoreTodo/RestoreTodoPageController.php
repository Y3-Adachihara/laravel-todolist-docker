<?php

namespace App\Http\Controllers\Todolist\RestoreTodo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todolist;

class RestoreTodoPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $todolists = Todolist::where([['status', '=', 1]])->get();
        /*
            where('status', 1)でもいいが、今後複数の条件をwhere句で追加したい場合、
            where([
                ['status', '=', 1],
                ...
            ])
            とできる。
        */

        return view('todo.restoretodo')->with(['todolists' => $todolists]);
        /*
            with('todolists', $todolists)でもいいが、これも上のやつと同じ。
            複数のパラメータを加えたい場合、今回の表記法の方が楽
        */
    }
}
