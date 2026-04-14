<form action="{{ route('restoretodo', ['todoId' => $todoId]) }}" method="POST">
    @method('PUT')
    @csrf
    <button type="submit" class="
    inline-flex justify-center
    ml-4
    py-4 px-4
    text-white bg-green-500 hover:bg-green-600 focus:ring-green-500
    border border-transparent
    shadow-sm
    text-lg
    font-medium
    rounded-md
    focus:outline-none focus:ring-2 focus:ring-offset-2">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
    </svg>
    </button>
</form>