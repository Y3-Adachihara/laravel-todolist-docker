<?php

namespace App\Http\Requests\Todolist;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EditTodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
    public function rules(): array
    {
        return [
            'content' => 'required',
            'deadline' => 'required|date',
        ];
    }
    public function todoId(): int {
        return (int) $this->route('todoId');
    }

    public function content(): string {
        return $this->input('content');
    }

    public function deadline(): string {
        return $this->input('deadline');
    }
}
