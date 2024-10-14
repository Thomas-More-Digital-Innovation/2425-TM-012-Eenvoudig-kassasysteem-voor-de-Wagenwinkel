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
                            <div class="w-full aspect-square flex items-center justify-center item relative">
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
                @if ($products != [])
                    <form action="{{ route('soortBetalen') }}" method="GET">
                        @csrf
                        <x-layout.greenArrow width="w-[250px] md:w-[391px]"></x-layout.greenArrow>
                    </form>
                @else
                    <div class="w-[250px] md:w-[391px]"></div>
                @endif
            </div>
        </div>
    </div>
</x-header>

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

                    const overlay = currentMarkedItem.querySelector('.overlay-image');
                    if (overlay) {
                        overlay.remove();
                    }
                }

                item.classList.add('marked', 'rounded-lg', 'bg-white-500', 'cross', 'removed', 'transparent');

                const overlayImg = document.createElement('img');
                overlayImg.src = "{{ asset('assets/images/money/remove_coin.png') }}";
                overlayImg.classList.add('overlay-image', 'absolute', 'top-0', 'left-0', 'w-full', 'h-full', 'z-10');
                overlayImg.style.pointerEvents = 'none';

                item.appendChild(overlayImg);
                currentMarkedItem = item;
            }
        });
    });
</script>

<style>
    .overlay-image {
        background: rgba(255, 255, 255, 0.5);
    }
</style>
