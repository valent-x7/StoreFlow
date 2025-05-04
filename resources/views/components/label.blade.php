@props(['for', 'name'])

<label for="{{ $for }}"
    name="{{ $name }}"
    class="text-2xl font-medium mb-2">
    {{ $slot }}
</label>