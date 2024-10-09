
<label for="organization" class="block text-3xl text-black font-bold">{{ $name }}</label>
<div class="relative">
    <select name="{{ $title }}" id="{{ $title }}" class="{{ $width ?? "w-96" }} text-gray-500 appearance-none mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" required>
        <?php
        foreach ($group as $item) {
            echo '<option  value="' . $item['organisatie_id'] . '">' . $item['naam'] . '</option>';
        }
        ?>
    </select>
</div>
