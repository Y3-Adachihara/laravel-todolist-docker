@props([
    'todolist' => [],
])

<x-layout.layout title="リスト | Todoアプリ">
    <x-layout.todolist-single>
        <ul class=" font-medium justify-start w-max">
            <li class="flex sticky top-10 mb-4 lg:col-span-1 justify-start text-xl bg-gray-100 border-b-4 border-gray-500">
                <div class="flex ml-3 w-96">
                    Todo
                </div>
                <div class="flex ml-3 w-32">
                    期限
                </div>
                <div class="flex w-8">
                        
                </div>
            </li>
            @if ($todolist->isEmpty())
                <li class="flex h-full w-auto justify-center items-center mb-4">
                    <div class="h-full justify-center text-4xl">完了したTodoはありません</div>
                </li>
            @else
                @foreach ($todolist as $todo)
                <li class="flex lg:col-span-1 items-center justify-start mb-4">
                    <p class="ml-3 text-xl w-96 text-gray-600">
                        {{ $todo->content }}
                    </p>
                    <p class="ml-3 text-xl w-32 text-gray-600">
                        {{$todo->deadline  }}
                    </p>
                    <x-element.button-restoretodo :todoId="$todo->id"></x-element.button-restoretodo>
                </li>
                @endforeach
            @emdif
            <li class="flex flex-wrap sticky bottom-6 lg:col-span-1 justify-center items-center text-xl bg-gray-100 border-t-4 border-gray-500">
                <div class="flex flex-wrap w-1/2 p-2 justify-evenly">
                    <x-element.button-a :href="route('todolist')">一覧に戻る</x-element.button-a>
                </div>
            </li>
        </ul>
    </x-layout.todolist-single>
</x-layout.layout>