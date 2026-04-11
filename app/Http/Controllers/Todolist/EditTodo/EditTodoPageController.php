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

    // ここの$requestは、Laravelが毎回勝手に用意してくれるリクエストファイル。
    // デフォルトではRequestクラスとなっているが、リクエストを自作した場合は、ここを自分で用意したリクエストファイルのクラス名に変える。
    public function __invoke(Request $request)
    {
        // ここでのroute()は、formタグのaction属性で書いたroute()とは別の動きをする。
        // あっちは、URLを生成するのが主な仕事。->name()の引数で指定した名前をroute()の引数として指定し、そのルーティングを呼び出す
        // 対してこっちは、URLの{}で指定したパラメータを取り出す役割がある。requestやcontrollerの中で使われる
        /* 
            ①todolist.blade.phpから編集ボタンが押され、todoIdという名前のパラメータがくっついたURLを受け取る（route()によってURLが生成された）。
            ②それを基にルーティングが行なわれる。今回は、{todoId}というパラメータをくっつける
            ③$request->route('todoId')の部分で、URLにくっついているパラメータを参照し、保持させる。
        */

        $todoId = (int) $request->route('todoId');
        $todo = Todolist::where('id', $todoId)->firstOrFail();
        return view('todolist.edittodo')->with('todo', $todo);
    }
}
