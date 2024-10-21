<x-header header="producten beheren">
    <div class="bg-white w-[1390px] p-5 rounded-lg shadow-lg">
        <!-- Column Headers -->
        <div class="flex justify-between items-center mb-1">
            <div class="flex justify-evenly w-full">
                <span class="font-bold text-3xl text-gray-400 flex-1">Zichtbaar</span>
                <span class="font-bold text-3xl text-gray-400 flex-1 ml-10">Foto</span>
                <span class="font-bold text-3xl text-gray-400 flex-1">Naam</span>
                <span class="font-bold text-3xl text-gray-400 flex-1 ml-14">Categorie</span>
                <span class="font-bold text-3xl text-gray-400 flex-1 ml-8">Voorraad</span>
                <span class="font-bold text-3xl text-gray-400 flex-1">Bewerken</span>
            </div>
        </div>

        <!-- Product List -->
        <div class="bg-gray-200 p-3 rounded-lg w-full h-[520px] overflow-y-auto">
            @foreach($producten as $product)
                <div class="bg-white p-4 rounded-lg flex justify-between items-center mb-3" style="min-height: 60px;">
                    <div class="flex-1 flex justify-start">
                        <img src="{{ asset('assets/images/eye.svg') }}" alt="Zichtbaar" class="w-14 h-14">
                    </div>
                    <div class="flex-1 flex justify-start">
                        <img src="{{ $product->afbeeldingen }}" alt="product picture" class="w-auto h-16 object-contain rounded-lg">
                    </div>
                    <div class="flex-1 flex justify-start">
                        <span class="text-xl font-bold">{{ $product->naam }}</span>
                    </div>
                    <div class="flex-1 flex justify-center">
                        <span class="text-xl font-bold">{{ $product->categorie->naam }}</span>
                    </div>
                    <div class="flex-1 flex justify-center">
                        <span class="text-xl font-bold">{{ $product->voorraad }}</span>
                    </div>
                    <div class="flex-1 flex justify-center">
                        <a href="{{ route('producten.edit', $product->product_id) }}">
                            <img src="{{ asset('assets/images/gear.svg') }}" alt="product bewerken" class="w-16 h-16">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pt-2 flex justify-between items-center mt-5">
            <a href="{{ route('settings') }}" class="w-[49%] h-60 bg-orange-200 py-8 rounded-md flex justify-evenly items-center">
                <x-layout.redArrow/>
            </a>
            <a href="{{ route('addProduct') }}" class="w-[49%] h-60 bg-blue-200 py-8 rounded-md flex justify-evenly items-center">
                <img src="{{ asset('assets/images/product_toevegen.svg') }}" alt="product toevoegen" class="w-[30%]">
            </a>
        </div>
    </div>
</x-header>
