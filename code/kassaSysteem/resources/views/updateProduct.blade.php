<x-header header="Product bewerken">
    <div class="bg-white p-5 rounded-lg shadow-lg">
        <!-- Product Update Form -->
        <form method="POST" action="{{ route('producten.update', $product->product_id) }}" enctype="multipart/form-data">
            <?php
            $categories = \App\Http\Controllers\ProductController::getCategory();
            $productCategorie = $product['categorie_id'];
            $displayCategorie = '';

            foreach ($categories as $categorie) {
                if ($categorie['categorie_id'] == $productCategorie) {
                    $displayCategorie = $categorie['naam'];
                    break;
                }
            }


            $producten = \App\Http\Controllers\ProductController::getAllProducts($productCategorie);
            $productPositie = $product['positie'];

            $usedPositions = [];
            foreach ($producten as $item) {
                $usedPositions[] = $item->positie;
            }

            $mogelijkePositie = range(1, 24);

            $availablePositions = array_diff($mogelijkePositie, $usedPositions);

            $availablePositions = array_values($availablePositions);

            ?>
            @csrf
            @method('PUT')

            <div class="bg-gray-200 p-5 rounded-lg mb-3">
                <div class="flex gap-10">
                    <div class="mb-3 flex flex-col justify-between">
                        <div>
                            <label for="naam" class="pl-1 block text-3xl text-black font-bold">Naam</label>
                            <input type="text" id="naam" name="naam" value="{{ old('naam', $product->naam) }}" class="w-full h-12 mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" required>

                        </div>
                        <div>
                            <label for="Categorie" class="block text-3xl text-black font-bold">Categorie</label>
                            <div class="relative">
                                <select name="categorie_id" class="w-full text-gray-500 appearance-none mt-1 block border border-gray-300 bg-white font-bold rounded-lg text-3xl" required>
                                    <option id="categorie_id" name="categorie_id" value="{{ $product['categorie_id'] }}" selected="selected" hidden>{{ $displayCategorie }}</option>
                                    @foreach ($categories as $categorie)
                                        <option id="categorie_id" name="categorie_id" value="{{ $categorie['categorie_id'] }}">{{ $categorie['naam'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <div class="">
                                <label for="voorraad" class="pl-1 block text-3xl text-black font-bold">Voorraad</label>
                                <input type="number" id="voorraad" name="voorraad" value="{{ old('voorraad', $product->voorraad) }}" class="w-[735px] h-12 mt-1 block border border-gray-300 bg-white font-bold rounded-lg text-3xl" required>
                            </div>

                            <div class="flex flex-col">
                                <span class="pl-1 block text-3xl text-black font-bold">Aangeven</span>
                                <input type="hidden" name="voorraadAanvullen" value="0">
                                <label for="voorraadAanvullen" class="pl-1 block text-3xl text-black font-bold switch mt-1">
                                    <input type="checkbox" id="voorraadAanvullen" name="voorraadAanvullen" value="1" {{ old('voorraadAanvullen', $product->voorraadAanvullen) ? 'checked' : '' }}>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <div class="w-full">
                                <label for="positie" class="block text-3xl text-black font-bold">Positie</label>
                                <div class="relative">
                                    <select name="positie" class="w-full text-gray-500 appearance-none mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl overflow-y-auto" required>
                                        <option id="positie" name="positie" value="{{ $productPositie }}" selected="selected" hidden>{{ $productPositie }}</option>
                                        @foreach ($availablePositions as $item)
                                            <option id="positie" name="positie" value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 gap-3">
                        <div class="mb-5">
                            <label for="actuele_prijs" class="pl-1 block text-3xl text-black font-bold">Prijs</label>
                            <input type="number" id="actuele_prijs" name="actuele_prijs" value="{{ old('actuele_prijs', $product->actuele_prijs) }}" class="w-[325px] h-12 mt-1 block border border-gray-300 bg-white font-bold rounded-lg text-3xl" required>
                        </div>

                        <label for="afbeeldingen" class="pl-1 block text-3xl text-black font-bold"></label>
                        <input type="file" id="afbeeldingen" name="afbeeldingen" accept=".png" class="hidden" onchange="previewImage(event)">
                        <label for="afbeeldingen" class="cursor-pointer">
                            <div class="w-[325px] h-[325px]">
                                <img id="imagePreview" src="{{ asset($product['afbeeldingen']) }}" alt="Image {{ $product['naam'] }}" class="object-cover w-full h-full rounded-lg">
                            </div>
                        </label>

                    </div>
                </div>
            </div>
        </form>

        <!-- Delete Form -->
        <div class="flex justify-center w-full gap-3">
            <div class="flex flex-col w-full gap-y-3">
                <div class="flex w-full">
                    <form method="POST" action="{{ route('producten.destroy', $product->product_id) }}" id="deleteForm" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete()" class="flex justify-center items-center w-full">
                            <div class="bg-gray-200 rounded-lg flex justify-center p-3 w-full">
                                <img src="{{ asset('assets/images/bin.svg') }}" alt="vuilbak" class="w-[30px]">
                            </div>
                        </button>
                    </form>
                </div>

                <div class="flex flex-row gap-3">
                    <div class="w-full">
                        <a href="{{ route('manage-products') }}">
                            <x-layout.redArrow></x-layout.redArrow>
                        </a>
                    </div>
                    <div class="w-full">
                        <a href="#" onclick="document.querySelector('form').submit();">
                            <x-layout.greenArrow></x-layout.greenArrow>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete() {
            if (confirm('Weet je zeker dat je dit product wilt verwijderen?')) {
                // If confirmed, submit the form
                document.getElementById('deleteForm').submit();
            }
        }

        function previewImage(event) {
            const file = event.target.files[0];
            const imagePreview = document.getElementById('imagePreview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result; // Update the image source
                }
                reader.readAsDataURL(file); // Read the file as a data URL
            }
        }
    </script>
</x-header>

<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 200px;
        height: 48px;
        border: 2px solid #cdcdcd;
        border-radius: 8px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #fff1f1;
        transition: .4s;
        border-radius: 20px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 40px;
        width: 40px;
        left: 2px;
        bottom: 2px;
        background-color: #649A76;
        transition: .4s;
        border-radius: 50%; /* Round the switch knob */
    }

    input:checked + .slider {
        background-color: #e9ffef;
    }

    input:checked + .slider:before {
        transform: translateX(153px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 8px;
    }

    .slider.round:before {
        border-radius: 30%;
    }
</style>
