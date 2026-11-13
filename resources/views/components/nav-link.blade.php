
@props(['active' => false])

@php
    $classes = ($active ?? false)
        ? 'flex w-full items-center rounded-xl px-4 py-3 text-sm font-semibold text-gray-900 bg-amber-100 transition-all duration-200 md:inline-flex md:w-auto md:rounded-none md:px-3 md:py-2 md:bg-transparent md:border-b-2 md:border-gray-900'
        : 'flex w-full items-center rounded-xl px-4 py-3 text-sm font-medium text-gray-500 transition-all duration-200 hover:bg-gray-50 hover:text-gray-900 md:inline-flex md:w-auto md:rounded-none md:px-3 md:py-2 md:border-b-2 md:border-transparent md:hover:bg-transparent md:hover:border-gray-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
