<x-header header="Items">
    <div class="bg-white p-4 rounded-lg shadow-lg relative">
        <div class="grid grid-cols-4 gap-2">
            <?php
            $totalItems = 12;
            $itemCount = count($items);

            $gridItems = array_fill(0, $totalItems, null);

            foreach ($items as $item) {
                $gridItems[$item['position'] - 1] = $item;
            }

            foreach ($gridItems as $gridItem): ?>
            <div class="w-48 h-48 flex items-center justify-center">
                    <?php if ($gridItem): ?>
                <img src="{{ $gridItem['imagePath'] }}" alt="Image {{ $gridItem['name'] }}" class="object-cover w-full h-full">
                <?php else: ?>
                <div class="bg-white flex items-center justify-center">
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="pt-3">
            <a href="{{route('category')}}">
                <x-layout.redArrow width="w-[391px]"></x-layout.redArrow>
            </a>
        </div>
    </div>
</x-header>
