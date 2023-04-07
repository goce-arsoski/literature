@props(['active'])

@php
$classes = ($active ?? false)
            ? 'relative flex items-center space-x-4 bg-gradient-to-r from-sky-600 to-cyan-400 px-4 py-3 text-white'
            : 'relative flex items-center space-x-4 px-4 py-3 text-gray-600';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>