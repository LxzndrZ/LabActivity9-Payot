@props(['title'])

<section class="bg-white rounded shadow">
    <h2 class="px-4 py-3 border-b font-semibold">{{ $title }}</h2>
    <div class="p-4 overflow-x-auto">
        {{ $slot }}
    </div>
</section>