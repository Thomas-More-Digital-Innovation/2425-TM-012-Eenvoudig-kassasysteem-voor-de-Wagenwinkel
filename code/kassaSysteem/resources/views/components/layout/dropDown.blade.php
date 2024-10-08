<div class="bg-gray-200 p-3 rounded-lg mb-3">
    <label for="organization" class="block text-3xl text-black font-bold">{{ $title }}</label>
    <div class="relative mb-8">
        <select name="{{ $title }}" id="{{ $title }}" class="{{ $width ?? "w-96" }} appearance-none mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" required>
            <?php
            foreach ($group as $item) {
                echo '<option value="' . $item . '">' . $item . '</option>';
            }
            ?>
        </select>
    </div>
</div>
