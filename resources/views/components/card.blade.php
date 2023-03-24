<div class="p-4 rounded-lg bg-indigo-300 dark:bg-indigo-800 dark:text-indigo-300">
    <div class="flex justify-between">
        <h1>{{ $title }}</h1>
        <svg xmlns="http://www.w3.org/2000/svg" id="arrow-circle-down" viewBox="0 0 24 24" width="24" height="24">
            <path d="{{ $icon }}" fill="rgb(165 180 252 / .5)" />
        </svg>
    </div>
    <div class="py-3 text-2xl">
        R$ {{ $money }}
    </div>
</div>