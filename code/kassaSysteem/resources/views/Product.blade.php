<x-header header="ProductSelectie">
    <div class="bg-white p-5 shadow-lg rounded-lg relative">
        <div id="count" class="mb-7 flex h-[108px]"> {{--max 12 blokjes--}}</div>
        <div class="flex space-x-3 pb-3">
            <button onclick="removeSquare()">
                <div class="bg-gray-300 rounded-lg text-center p-[70px] flex items-center justify-center">
                    <img src="{{ asset('assets/images/bin.png') }}" alt="bin" class="h-[300px] w-[300px] object-contain aspect-square">
                </div>
            </button>
            <button onclick="showSquare()">
                <div class="bg-purple-800 rounded-lg text-center p-5 flex items-center justify-center">
                    <img src="{{ asset($product->afbeeldingen) }}" alt="{{ $product->naam }}" class="h-400 w-400 object-contain aspect-square">
                </div>
            </button>
        </div>
        <div class="flex space-x-3 h-60">
            <form action="{{ route('products', ['categoryId' => $product->categorie_id]) }}" method="GET" class="w-full h-auto rounded-md flex justify-evenly items-center">
                @csrf
                <x-layout.redArrow/>
            </form>
            <form action="{{ route('cart.product-add', ['id' => $product->product_id]) }}" method="POST" class="w-full h-auto rounded-md flex justify-evenly items-center">
                @csrf
                <input type="number" id="amount" name="amount" value="0" min="0" hidden>
                <x-layout.greenArrow/>
            </form>
        </div>
    </div>
    <script>
        let counter = 0;
        const maxStock = {{ $product->voorraad }};
        let voorAangevenOrg = {{ $setting->voorraadAangeven }};
        let voorAangevenPro = {{ $product->voorraadAanvullen }};

        function showSquare() {
            if (voorAangevenOrg && voorAangevenPro)
            {
                if (counter < maxStock) {
                    counter++;
                }
            }
            else{
                counter++;
            }


            // Create content based on the counter
            let content = '';

            // Calculate how many blocks to show (max 8)
            let displayedCount = Math.min(counter, 8);

            // Generate the blocks
            for (let i = 0; i < displayedCount; i++) {
                if (i === displayedCount - 1) {
                    // Only the last box shows the counter value
                    content += `<div class="numberedField m-[9.1px] w-[93px] h-[93px] bg-purple-900 rounded-lg text-white flex justify-center items-center font-bold text-4xl">${counter}</div>`;
                } else {
                    // Other boxes are empty
                    content += `<div class="m-[9.1px] w-[93px] h-[93px] bg-purple-900 rounded-lg text-white flex justify-center items-center"></div>`;
                }
            }

            // Update the amount input and the displayed blocks
            document.getElementById('amount').value = counter;
            document.getElementById('count').innerHTML = content;
        }

        function removeSquare() {
            // Reset the counter and clear the displayed squares
            counter = 0;
            let content = '';

            // No blocks are displayed after removal
            document.getElementById('amount').value = counter;
            document.getElementById('count').innerHTML = content;
        }
    </script>
</x-header>
