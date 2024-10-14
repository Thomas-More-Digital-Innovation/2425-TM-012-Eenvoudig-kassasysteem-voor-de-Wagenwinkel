<x-header header="Winkelmand">
    <div class="bg-white w-11/12 md:w-4/5 px-4 h-auto min-h-[85vh] rounded-lg flex flex-col justify-between items-center">
        <div class="bg-gray-200 w-full h-[400px] md:h-[600px] rounded-lg m-4 p-4">
            @php
                $products = \App\Helpers\Shopping_cart::getRecords();
            @endphp

            @if ($products != [])
                <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-12 gap-2 w-full">
                    @foreach ($products as $product)
                        @for ($i = 0; $i < $product['aantal']; $i++)
                            <div class="w-full aspect-square flex items-center justify-center item">
                                <button class="w-full h-full rounded-lg" data-product-id="{{ $product['id'] }}">
                                    <img src="{{ asset($product['afbeelding']) }}" id="{{ $i }}" alt="{{ $product['naam'] }}" class="object-cover h-full w-full rounded-lg"/>
                                </button>
                            </div>
                        @endfor
                    @endforeach
                </div>
            @else
                <div class="flex items-center justify-center w-full h-full">
                    <span class="text-center text-xl font-bold">Winkelmand is leeg!</span>
                </div>
            @endif
        </div>

        <div class="flex flex-row justify-between items-center mb-4 w-full">
            <div>
                <form action="{{ route('category') }}" method="GET">
                    @csrf
                    <x-layout.redArrow width="w-[250px] md:w-[391px]"></x-layout.redArrow>
                </form>
            </div>
            <p class="w-full text-center total-font-size inter-text">Totaal: {{ \App\Helpers\Shopping_cart::getPrice() }} €</p>
            <div>
                <form action="{{ route('soortBetalen') }}" method="GET">
                    @csrf
                    <x-layout.greenArrow width="w-[250px] md:w-[391px]"></x-layout.greenArrow>
                </form>
            </div>
        </div>

    </div>
</x-header>



@stack('script')

<script>
    let currentMarkedItem = null;

    document.querySelectorAll('.item button').forEach(button => {
        button.addEventListener('click', function () {
            const item = this.parentElement;
            const productId = this.getAttribute('data-product-id');
            const baseUrl = "{{ route('cart.remove-product', ['id' => '']) }}";

            if (item.classList.contains('removed')) {
                item.style.display = 'none';
                window.location.href = baseUrl + '/' + productId;
            } else {
                if (currentMarkedItem) {
                    currentMarkedItem.classList.remove('marked', 'bg-white-500', 'cross', 'removed', 'transparent');
                }
                item.classList.add('marked', "rounded-lg", 'bg-white-500', 'cross', 'removed', 'transparent');
                currentMarkedItem = item;
            }
        });
    });


</script>

<style>
    /* Ensures that each item has a square aspect ratio */
    .transparent {
        opacity: 0.5;
    }

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
        background-color: Red;
        top: 50%;
        left: 0;
        padding: 5px;
    }

    .cross::before {
        transform: rotate(45deg);
    }

    .cross::after {
        transform: rotate(-45deg);
    }

    .marked img {

        /*display: none; !* Hides the image when the item is marked *!*/
    }
</style>
