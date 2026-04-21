<form action="{{ route('withdrawal') }}" method="POST" onclick="return confirm('アカウントを削除してもよろしいですか？\r\n※一度削除すると再度アカウントを登録する必要があります。');">
    @method('DELETE')
    @csrf
    <button type="submit" class="
    inline-flex justify-center
    ml-4
    py-2 px-4
    text-white bg-red-500 hover:bg-red-600 focus:ring-red-500
    border border-transparent
    shadow-sm
    text-lg
    font-medium
    rounded-md
    focus:outline-none focus:ring-2 focus:ring-offset-2">
    退会する
    </button>
</form>