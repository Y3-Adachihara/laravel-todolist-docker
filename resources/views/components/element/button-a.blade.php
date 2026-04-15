@props([
    'href' => '',
    'theme' => '',
])

{{--
    ＠php以外のコメントはこの記号を使う。必ず＠propsを先頭に来させる。
    親ビュー（todolist.blade.php）からデータを受け取るための受け取り窓口が＠props
    生PHPの時のように＠phpの中で初期化の宣言をしてしまうと、親ビューからhrefなどの値が受け取れなくなってしまい、全てこのbutton-a.blade.phpの中で宣言した色や遷移先のボタンしか作れなくなってしまう

    ボタンでエラーが生じていた時、このコンポーネントを使っている箇所でエラーが起きるため、表示できているビューに置かれているコンポーネントは正常。
    そのため、このボタンを含め、コンポーネントでエラーが生じていたら、エラーが生じているビューを見つけることが第一。
--}}

@php
    // phpでは、同じ名前空間内で同じ名前の関数を定義することはできない。button-aが呼び出されているのは同じforeach文の中(=同じ名前空間)となるため、if文でチェックして最初のループ以外突っぱねる必要がある。
    if (!function_exists('getThemeClassForButtonA')) {
        function getThemeClassForButtonA($theme) {
            return match ($theme) {
                'add' => 'py-2 px-4 text-white bg-blue-500 hover:bg-blue-600 focus:ring-blue-500',
                'undo' => 'py-2 px-4 text-white bg-green-500 hover:bg-green-600 focus:ring-green-500',
                'edit' => 'py-4 px-4 text-white bg-green-500 hover:bg-green-600 focus:ring-green-500',
                default => '',
            };
        }
    }
@endphp

<a href="{{ $href }}" class="
    inline-flex justify-center
    ml-4
    border border-transparent
    shadow-sm
    text-lg
    font-medium
    rounded-md
    focus:outline-none focus:ring-2 focus:ring-offset-2
    {{ getThemeClassForButtonA($theme) }}">
    {{ $slot }}
</a>