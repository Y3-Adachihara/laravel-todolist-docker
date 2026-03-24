@props([
    'href' => '',
    'theme' => '',
])
@php
    if (!function_exists('getThemeClassForButtonA')) {
        function getThemeClassForButtonA($theme) {
            return match ($theme) {
                'add' => 'py-2 px-4 text-white bg-blue-500 hover:bg-blue-600 focus:ring-blue-500',
                'undo' => 'py-2 px-4 text-white bg-green-500 hover:bg-green-600 focus:ring-green-500',
                'edit' => 'py-4 px-4 text-white bg-green-500 hover:bg-green-600 focus:ring-green-500',
                'default' => '',
            };
        }
    }
@endphp

<a href="{{ $href }}" class="
    inline-flex justify-center
    ml-4
    border border-transparent
    shadow-sm
    text-lg
    font-medium
    rounded-md
    focus:outline-none focus:ring-2 focus:ring-offset-2
    {{ getThemeClassForButtonA($theme) }}">
    {{ $slot }}
</a>