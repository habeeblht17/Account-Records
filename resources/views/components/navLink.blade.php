@props(['active'])

@php
$classes = ($active ?? false)
            ? 'border-l-2 my-2 border-blue-600 text-md font-medium leading-5 text-gray-700 hover:text-gray-100 focus:outline-none block px-4 py-3 hover:bg-blue-600 rounded-md dark:text-gray-100 '
            : 'border-l-2 my-2 border-transparent text-md font-medium leading-5 text-gray-500 hover:text-gray-100 focus:outline-none block px-4 py-3 hover:bg-blue-600 rounded-md transition dark:text-gray-100';
@endphp


<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

