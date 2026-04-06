<?php

namespace App\Http\Requests\Todolist;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;


// このクラスは、フォームが送られた際に自動で生成。__invokeの引数にAddTodoRequest $requestと記述することで、そのフォームで送信された内容を挿入ないし色々する際、挟むリクエストを指定できる
class AddTodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * ここは追加処理をする権限があるかをチェック（part2の時点では、とりあえず全員パスさせている。）
     * ※インスタンス生成後、自動実行
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */

    // フォームから送信されたデータが空だったりすると、ここで引っ掛かって直前の画面（今回はTodo追加画面）に強制送還。
    // コントローラの処理は一切実行されない。
    // ※インスタンス生成後、自動実行
    public function rules(): array
    {
        return [
            'content' => 'required',
            'deadline' => 'required|date',
        ];
    }

    // $this、すなわちAddTodoRequest=自分自身 のインスタンスは、ユーザが送信したフォームの内容=リクエスト情報が入っている。
    public function userId(): int {
        // $this->user()で、今ログインしているユーザの情報を取得する。-.idで、ユーザIDを取得する。
        return $this->user()->id;
    }

    public function content(): string { 
        // フォームのname属性がcontentのinputタグで受け取ったデータを返す
        return $this->input('content');
    }

    public function deadline(): string {
        // フォームのname属性がdeadlineのinputタグで受け取ったデータを返す
        return $this->input('deadline');
    }
}
