@props(['active'])

@php
$classes = ($active ?? false)
            ? 'border-b-2 border-green-700 p-2 '
            : 'p-2 ';
@endphp

<a {{$attributes->merge(['class' => $classes]) }} >
    {{ $slot }}
</a>
