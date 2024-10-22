<x-header header="Items">
    <div class=" bg-white p-5  rounded-lg shadow-lg relative flex flex-col justify-around">
        <div class="grid grid-cols-8 grid-rows-3 gap-2">
            <?php
            $totalItems = 24;
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
        <div class="flex">
            <div class="w-full h-full">
                <a href="{{ route('category') }}">
                    <x-layout.redArrow width="w-full"></x-layout.redArrow>
                </a>
            </div>
            <div class="w-full h-full">
                <div class="w-full "></div>
            </div>
        </div>
    </div>
</x-header>
