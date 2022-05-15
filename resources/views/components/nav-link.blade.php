@props(['active'])

@php
$classes = ($active ?? false)

            ? 'underline decoration-green-700'
            : 'p-2 ';
@endphp

<a {{$attributes->merge(['class' => $classes]) }} >
    {{ $slot }}
</a>
