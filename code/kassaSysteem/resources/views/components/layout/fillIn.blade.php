<div>
    <label for="organization" class="pl-1 block text-3xl text-black font-bold">{{ $name }}</label>
    <div class="relative flex items-center">
        <input type="text" name="{{ $title }}" id="{{ $title }}" class="{{ $width ?? "w-96" }} h-12 mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" placeholder="{{ $placeholder }}" required />
    </div>
</div>

