{{-- Nav Link Component --}}

@props(['active', 'href'])

@php
    $classes = ($active ?? false)
                ? 'border-indigo-400 text-gray-900 focus:border-indigo-700'
                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300';
@endphp

<a href="{{ $href }}" {{ $attributes->merge([
    'class' => 'inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out' . $classes
]) }}>
    {{ $slot }}
</a>