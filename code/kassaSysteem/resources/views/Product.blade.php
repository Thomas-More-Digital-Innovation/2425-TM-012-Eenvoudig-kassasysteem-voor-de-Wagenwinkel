<x-header header="ProductSelectie">
    <div class="bg-white p-5 shadow-lg rounded-lg relative">
        <div id="count" class="mb-7 flex h-[108px]"> {{--max 12 blokjes--}}</div>
        <div class="flex space-x-3 pb-3">
            <button onclick="removeSquare()">
                <div class="bg-gray-300 rounded-lg text-center p-20 flex items-center justify-center">
                    <img src="{{ asset('assets/images/bin.png') }}" alt="bin" class="h-400 w-400 object-contain aspect-square">
                </div>
            </button>
            <button onclick="showSquare()">
                <div class="bg-green-300 rounded-lg text-center p-5 flex items-center justify-center ">
                    <img src="{{ asset($product->afbeeldingen)}}" alt="{{ $product->naam }}" class="h-[520px] w-[520px] object-contain aspect-square">
                </div>
            </button>
        </div>
        <div class="flex space-x-3">
            <form action="{{ route('products', ['categoryId' => $product->categorie_id] ) }}" method="GET" class="w-full h-60 bg-orange-200 py-8 rounded-md  flex justify-evenly items-center">
                @csrf
                <x-layout.redArrow/>
            </form>
            <form action="{{ route('cart.product-add', ['id' => $product->product_id]) }}" method="POST" class="w-full h-60 bg-orange-200 py-8 rounded-md  flex justify-evenly items-center">
                <input type="number" id="amount" name="amount" value="0" min="0" hidden>
                @csrf
                <x-layout.greenArrow/>
            </form>
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
                    content += `<div class="numberedField m-[9.1px] w-[95px] h-[95px] bg-purple-900 rounded-lg text-white flex justify-center items-center font-bold text-4xl">${counter}</div>`;
                } else {
                    // Other boxes are empty
                    content += `<div class="m-[9.1px] w-[95px] h-[95px] bg-purple-900 rounded-lg text-white flex justify-center items-center"></div>`;
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



