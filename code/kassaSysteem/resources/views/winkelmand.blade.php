<x-header header="Winkelmand">
    <div class="bg-white w-4/5 h-[85vh] rounded-lg flex flex-col justify-between items-center">
        <!-- Grid containing items from the session -->
        <div class="bg-gray-200 h-[500px] rounded-lg w-11/12 mt-4 p-4">
            <div class="grid grid-cols-12 gap-2 w-full sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-12">
                @php
                    $totalItems = 48;
                    $gridItems = array_fill(0, $totalItems, null);


                    $cartItems = session('cart', []);

                    foreach ($cartItems as $item) {
                        // Assuming each item has a position key for display
                        if (isset($item['position']) && $item['position'] > 0 && $item['position'] <= $totalItems) {
                            $gridItems[$item['position'] - 1] = $item; // Assign item to grid based on its position
                        }
                    }
                @endphp

                @foreach ($gridItems as $gridItem)
                    <div class="w-full aspect-square flex items-center justify-center">
                        @if ($gridItem && isset($gridItem['afbeeldingen']))
                            <button onclick="showSquare()" class="bg-red-400 w-[233px] h-[207px] mt-1 rounded-lg">
                                <img src="{{ asset($gridItem['afbeeldingen']) }}" alt="{{ $gridItem['naam'] }}" class="object-cover h-full w-full rounded-lg border-8 border-emerald-400"/>
                            </button>
                        @else
                            <div class="w-full h-full flex items-center justify-center empty-item"></div>
                        @endif
                    </div>
                @endforeach

            </div>
        </div>

        <!-- Footer with buttons and total price -->
        <div class="flex justify-between items-center mb-7 w-11/12">
            <div>
                <form action="{{ route('category') }}" method="GET">
                    @csrf
                    <x-layout.redArrow width="w-80"></x-layout.redArrow>
                </form>
            </div>
            <p class="w-full text-center total-font-size inter-text">Totaal: {{ \App\Helpers\Shopping_cart::getPrice() }} €</p>
            <div>
                <form action="{{ route('soortBetalen') }}" method="GET">
                    @csrf
                    <x-layout.greenArrow width="w-80"></x-layout.greenArrow>
                </form>
            </div>
        </div>
    </div>
</x-header>

@stack('script')

<script>
    document.querySelectorAll('.item').forEach(item => {
        // Check if item has class 'empty-item', if so, do not add click functionality
        if (!item.classList.contains('empty-item')) {
            item.addEventListener('click', function () {
                if (this.classList.contains('removed')) {
                    this.style.display = 'none';
                } else {
                    this.classList.add('marked', 'bg-red-500', 'cross', 'removed');
                }
            });
        }
    });
</script>

<style>
    /* Ensures that each item has a square aspect ratio */
    .aspect-square {
        aspect-ratio: 1 / 1;
    }

    /* Prevent clicks on empty items */
    .empty-item {
        pointer-events: none;
    }

    .cross {
        position: relative;
    }

    .cross::before, .cross::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 2px;
        background-color: white;
        top: 50%;
        left: 0;
    }

    .cross::before {
        transform: rotate(45deg);
    }

    .cross::after {
        transform: rotate(-45deg);
    }

    .marked img {
        display: none; /* Hides the image when the item is marked */
    }
</style>
