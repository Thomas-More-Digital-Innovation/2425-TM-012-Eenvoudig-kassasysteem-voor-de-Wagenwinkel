<x-header header="Product selectie">
<div class="bg-white p-4 rounded-lg mb-3">
    <div id="count" class="mb-7 flex h-[40px]"> {{--max 12 blokjes--}} </div>

    <div class="flex justify-between items-center mb-1 w-11/12">
        <div class="">
            <button onclick="removeSquare()" class="bg-gray-200 rounded-lg w-[233px] h-[207px] flex justify-center items-center">
                <img src="{{ asset('assets/images/bin.png') }}" alt="vuilnisbak" class=" w-[50%]">
            </button>
        </div>
        <div class="mx-2">
        <button onclick="showSquare()" class="bg-red-400 w-[233px] h-[207px] mt-1 rounded-lg">
            <img src="{{ asset($product->afbeeldingen) }}" alt="{{ $product->naam }}" class="object-cover h-full w-full rounded-lg border-8 border-emerald-400"/>
        </button>
        </div>
    </div>

    <div class="flex justify-between items-center mb-2 w-11/12">
        <div class="">
            <form action="{{ route('products', ['categoryId' => $product->categorie_id] ) }}" method="GET">
                @csrf
                <x-layout.redArrow width="w-[233px]"></x-layout.redArrow>
            </form>
        </div>

        <div class="mx-2">
            <form action="{{ route('cart.product-add') }}" method="POST">
                <input type="number" id="productId" name="productId" value="{{ $product->product_id }}" hidden>
                <input type="number" id="amount" name="amount" value="1" min="1" hidden>
                @csrf
                <x-layout.greenArrow width="w-[233px]"></x-layout.greenArrow>
            </form>
            {{--<button wire:click="addToBasket({{ $product->product_id }})"
                    class="w-[233px] h-auto bg-green-300 py-8 rounded-md hover:bg-green-200 transition-colors flex justify-center">
                <img src="{{ asset('assets/images/green_arrow.png') }}" alt="">
            </button>--}}
        </div>
    </div>
</div>

<script>
    let counter = 0;

    function showSquare() {
        counter++;
        let i = 0;
        let content = '';
        if (counter > 10) {
            counter = 10
        }
        for (let i = 0; i < counter; i++)  {
            if (i === counter - 1) {
                // Only the last box shows the counter value
                content += `<div class="numberedField m-1 w-[40px] h-[40px] bg-purple-900 rounded-lg text-white flex justify-center items-center font-bold text-xl">${counter}</div>`;
            } else {
                // Other boxes are empty
                content += `<div class="m-1 w-[40px] h-[40px] bg-purple-900 rounded-lg text-white flex justify-center items-center"></div>`;
            }

        }
        document.getElementById('amount').value = counter
        document.getElementById('count').innerHTML = content;
    }

    function removeSquare() {
        counter = 0;
        let i = 0;
        let content = '';

        while (i < counter) {
            content += '<div class="m-1 w-[35px] h-[35px] bg-purple-900 rounded-lg"></div>';
            console.log(counter);
            i++;
        }
        document.getElementById('amount').value = counter
        document.getElementById('count').innerHTML = content;
    }
</script>
</x-header>
