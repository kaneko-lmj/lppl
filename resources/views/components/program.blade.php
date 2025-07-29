@props(['icon', 'title', 'desc'])

<div class="p-4 rounded-lg shadow hover:shadow-md transition">
    <div class="text-4xl mb-2">{{ $icon }}</div>
    <h3 class="font-semibold text-lg mb-1">{{ $title }}</h3>
    <p class="text-sm text-gray-600">{{ $desc }}</p>
</div>
