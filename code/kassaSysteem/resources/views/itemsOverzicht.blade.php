<x-header header="Items">
    <div class="w-[1390px] h-[85vh] bg-white p-5  rounded-lg shadow-lg relative flex flex-col justify-around">
        <div class="grid grid-cols-8 grid-rows-3 gap-2">
            <?php
            $totalItems = 15;
            $itemCount = count($producten);

            $gridItems = array_fill(0, $totalItems, null);


            foreach ($producten as $item) {
               $gridItems[$item['positie'] - 1] = $item;
            }

            foreach ($gridItems as $gridItem): ?>
                <?php if ($gridItem): ?>
                    <form action="product/{{ $gridItem['product_id'] }}" method="GET">
                        <button type="submit" class="w-40 h-40 flex items-center justify-center">
                            <img src="{{ asset($gridItem['afbeeldingen']) }}" alt="Image {{ $gridItem['naam'] }}" class="object-cover w-full h-full rounded-lg">
                        </button>
                    </form>
                        <?php else: ?>
                            <div class="bg-white w-40 h-40 flex items-center justify-center"></div>
                        <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="pt-2 ">
            <a href="{{ route('category') }}">
                <x-layout.redArrow width="w-[391px]"></x-layout.redArrow>
            </a>
        </div>
    </div>
</x-header>
