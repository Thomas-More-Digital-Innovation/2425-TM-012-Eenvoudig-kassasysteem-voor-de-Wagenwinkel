<x-header header="Items">
    <div class="bg-white p-4 rounded-lg shadow-lg relative">
        <div class="grid grid-cols-4 gap-2">
            <?php
            $totalItems = 12;
            $itemCount = count($producten);

            $gridItems = array_fill(0, $totalItems, null);


            foreach ($producten as $item) {
               $gridItems[$item['product_id']] = $item;
            }





            foreach ($gridItems as $gridItem): ?>
                <?php if ($gridItem): ?>
                    <form action="product/{{ $gridItem['product_id'] }}" method="GET">
                        <button type="submit" class="w-48 h-48 flex items-center justify-center">
                            <img src="{{ asset($gridItem['afbeeldingen']) }}" alt="Image {{ $gridItem['naam'] }}" class="object-cover w-full h-full">
                        </button>
                    </form>
                        <?php else: ?>
                            <div class="bg-white w-48 h-48 flex items-center justify-center"></div>
                        <?php endif; ?>

            <?php endforeach; ?>
        </div>
        <div class="pt-3">
            <a href="{{ route('category') }}">
                <x-layout.redArrow width="w-[391px]"></x-layout.redArrow>
            </a>
        </div>
    </div>
</x-header>
