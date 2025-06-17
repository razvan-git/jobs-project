@props(['label', 'name', 'checked' => false])


@php
    $defaults = [
        'type' => 'checkbox',
        'id' => $name,
        'name' => $name,
        'value' => old($name),
    ];
@endphp

<x-forms.field :$label :$name :$checked>
    <div class="rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full">
        <input {{ $attributes($defaults) }} {{ $checked }}>
        <span class="pl-1">{{ $label }}</span>
    </div>
</x-forms.field>
