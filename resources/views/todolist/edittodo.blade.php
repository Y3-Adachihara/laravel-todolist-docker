<x-layout.layout title="Todo編集 | Todoアプリ">
    <x-layout.todolist-single>
        <form method="POST" action="{{ route('todolist')}}" class="justfy-center">
            @method('PUT')
            @csrf
            <div class="flex flex-col justify-center">
                <div class="flex justify-center mb-4 text-4xl font-extralight text-green-500">Todoを編集</div>
                @csrf

                <div class="flex justify-center items-center">
                    <div class="text-xl w-20">Todo</div>
                    <input type="text" name="content" value="{{ $todo->content }}" class="@error('content') is-invalid @enderror w-full ml-4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-green-500 dark:focus:border-green-600 focus:ring-green-500 dark:focus:ring-green-600 rounded-md shadow-sm">
                </div>
                @error('content')
                        <div style="color: red" class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="flex justify-center items-center mt-4">
                    <div class="flex text-xl w-20">期限</div>
                    <input type="date" name="deadline" value="{{ $todo->deadline }}" class="@error('deadline') is-invalid @enderror flex w-full ml-4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-green-500 dark:focus:border-green-600 focus:ring-green-500 dark:focus:ring-green-600 rounded-md shadow-sm">        
                </div>
                @error('deadline')
                        <div style="color: red" class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="flex mt-4 justify-center">
                    <x-element.button-addtodo>確　定</x-element-button-addtodo>
                </div>
            </div>
        </form>
    </x-layout.todolist-single>
</x-layout.layout>