<x-layout.layout title="アカウント情報 | Todoアプリ">
    <x-layout.todolist-single>
        <div class="flex flex-col items-center">
            <div class="my-4 text-4xl font-extrabold text-green-500">
                アカウント情報
            </div>
            <div class="items-start">
                <div class="flex items-start">
                    <div class="flex text-xl max-w-36 w-full">ユーザー名</div>
                    <div class="flex ml-4 text-xl">
                        {{ $name }}
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex text-xl max-w-36 w-full">メールアドレス</div>
                    <div class="flex ml-4 text-xl">
                        {{ $email }}
                    </div>
                </div>
            </div>
            
            <div class="flex mt-4">
                <x-element.button-a :href="route('todolist')">一覧に戻る</x-element>
                <x-element.button-withdrawal></x-element.button-withdrawal>
            </div>
        </div>
    </x-layout.todolist-single>
</x-layout.layout>