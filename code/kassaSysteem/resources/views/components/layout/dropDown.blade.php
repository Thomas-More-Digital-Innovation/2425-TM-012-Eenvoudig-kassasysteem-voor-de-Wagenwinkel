<div class="bg-gray-200 p-3 rounded-lg mb-3">
    <label for="organization" class="block text-3xl text-black font-bold">{{ $title }}</label>
    <div class="relative mb-8">
        <select name="organization" id="organization" class="{{ $width ?? "w-96" }} mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl appearance-none" required>
            <?php
            foreach ($group as $item) {
                echo '<option value="' . $item . '">' . $item . '</option>';
            }
            ?>
        </select>
        <div class="absolute inset-y-0 right-0 flex items-center pr-5 pointer-events-none">
            <img src="{{ asset('assets/images/dropDownArrow.png') }}" alt="Verdergaan" class="h-4 w-auto">
        </div>
    </div>
</div>
