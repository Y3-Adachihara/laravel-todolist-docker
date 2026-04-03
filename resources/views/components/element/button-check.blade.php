{{--
    ・route()はURLメーカーのようなもの。name()で定義した文字列を引数として指定すると、Route::put()の第一引数がURL文字列として置き換えられる。

    ・formタグでmethod="POST"と指定しているのに@method('PUT')としているのは、formで扱えるメソッドとLaravel側で使いたいメソッドの違いによるもの。
    　formタグはPOSTとGETのみ使用できるが、Laravelではデータの更新処理をPUTやPATCHで行いたいというルールがある。
    　HTML側ではmethod="POST"としておき、隠しコマンドとして@method='PUT'を入れることで、<input type="hidden" name="_method" value="PUT">という隠し属性が生成され、Laravel側でRoute::put()で定義したルーティングに振り分けられる。
    　→ メソッドパディングと呼ぶ
--}}

<form action="{{ route('checktodo', ['todoId' => $todoId]) }}" method="POST">
    @method('PUT')
    @csrf
    <button type="submit" class="
        e-flex justify-center
        ml-4
        py-2 px-2
        text-white bg-blue-500 hover:bg-blue-600 focus:ring-blue-500
        border border-transparent
        shadow-sm
        text-lg
        font-medium
        rounded-md
        focus:outline-none focus:ring-2 focus:ring-offset-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
        </svg>
    </button>
</form>