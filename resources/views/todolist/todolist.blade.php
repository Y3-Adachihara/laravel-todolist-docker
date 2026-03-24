@props([
    'user_name' => '',
    'todolists' => [],
])
<x-layout.layout title="リスト | Todoアプリ">
    <x-layout.todolist-single>
        <ul class=" font-medium justify-start w-max">
            <li class="flex sticky top-10 mb-4 lg:col-span-1 items-center text-xl bg-gray-100 border-b-4 border-gray-500">
                <div class="flex ml-4 w-10">
                </div>
                <div class="flex ml-3 w-96">
                    「{{ $user_name }}」さんのTodo
                </div>
                <div class="flex ml-3 w-32">
                    期限
                </div>
                <div class="flex w-8">
                        
                </div>
                <div class="flex w-8">
                        
                </div>
            </li>
            @if ($todolists->isEmpty())
                <li class="flex h-full w-auto justify-center items-center mb-4">
                    <div class="h-full justify-center text-4xl">Todoを入力してください</div>
                </li>
            @else
                @foreach($todolists as $todo)
                <li class="flex lg:col-span-1 items-center justify-start mb-4">
                        <div class="flex items-center">
                            <x-element.button-check :todoId="$todo->id"></x-element.button-check>
                        </div>
                        <p class="ml-3 text-xl w-96 text-gray-600">
                            {{ $todo->content }}
                        </p>
                        <p class="ml-3 text-xl w-32 text-gray-600">
                            {{ $todo->deadline }}
                        </p>
                        <x-element.button-a :href="route('todolist')" theme="edit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </x-element.button-a>
                        <x-element.button-deltodo :todoId="$todo->id"></x-element.button-deltodo>
                    </li>
                @endforeach    
            @endif

            <li class="flex flex-wrap sticky bottom-6 lg:col-span-1 justify-center items-center text-xl bg-gray-100 border-t-4 border-gray-500">
                <div class="flex flex-wrap w-1/2 p-2 justify-evenly">
                    <x-element.button-a :href="route('todolist')" theme="add">Todo登録</x-element.button-a>
                    <x-element.button-a :href="route('todolist')" theme="undo">Todo復元</x-element.button-a>
                </div>
            </li>
        </ul>
    </x-layout.todolist-single>
</x-layout.layout>