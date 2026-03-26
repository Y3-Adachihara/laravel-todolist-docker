<?php

namespace App\Http\Requests\Todolist;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddTodoRequest extends FormRequest
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
            'deadline' => 'required',
        ];
    }
    public function userId(): int {
        return $this->user()->id;
    }

    public function content(): string {
        return $this->input('content');
    }

    public function deadline(): string {
        return $this->input('deadline');
    }
}
