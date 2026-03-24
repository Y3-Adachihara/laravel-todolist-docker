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