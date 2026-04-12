{{-- Button Component --}}
@props(['href' => null, 'type' => 'button', 'variant' => 'primary'])

@php
    $baseClasses = "inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-sm transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2";
    
    $variants = [
        'primary' => "text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:ring-indigo-500",
        'secondary' => "text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:ring-indigo-500",
    ];

    $selectedVariant = $variants[$variant] ?? $variants['primary'];
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => "$baseClasses $selectedVariant"]) }} style="text-decoration: none;">
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => "$baseClasses $selectedVariant"]) }}>
        {{ $slot }}
    </button>
@endif
