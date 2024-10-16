<label class="flex items-center cursor-pointer">
    <div class="relative">
        <input type="checkbox" class="sr-only" {{ $checked ? 'checked' : '' }}>
        <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
        <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition {{ $checked ? 'translate-x-full bg-green-500' : '' }}"></div>
    </div>
</label>
