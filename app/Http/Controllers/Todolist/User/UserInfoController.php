<?php

namespace App\Http\Controllers\Todolist\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInfoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Authを先頭につけることで、認証関連の機能を利用できる。
        // ファザードを使い、メソッド名を後ろに指定することで、様々な認証に関する機能を呼び出せる。
        // user()なら、今ログインしているユーザの情報（Userインスタンス）を丸ごとスポっと取ってくる
        $user = Auth::user();
        return view('todolist.userinfo')->with(['name' => $user->name, 'email' => $user->email]);
    }
}
