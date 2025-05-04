@props(['type', 'p_text' => '', 'a_text' => '', 'href'])

<p class="{{ $type === 'center' ? 'text-center' : 'text-right' }}">
    {{ $p_text }}
    <a href="{{ $href }}"
        class="text-[#0066cc] hover:text-[#0052a3]">
        {{ $a_text }}
    </a>
</p>