@props(['type', 'last', 'name', 'placeholder' => ''])

<input type="{{ $type }}"
    placeholder="{{ $placeholder }}"
    name="{{ $name }}"
    value="{{ old($name) }}"
    class="text-xl font-medium p-3 border border-black/20 rounded-md 
           focus:outline-none focus:ring-2 focus:ring-[#0066cc]
           invalid:focus:ring-red-600
           transition duration-150 ease-in-out
    {{ $last ? 'mb-2' : 'mb-6'  }}">