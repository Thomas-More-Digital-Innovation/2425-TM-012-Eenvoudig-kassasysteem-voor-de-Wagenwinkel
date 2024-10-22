<x-header header="producten beheren">
    <div class="bg-white p-5 w-[1172px] rounded-lg shadow-lg">
        <!-- Column Headers -->
        <div class="flex justify-between items-center mb-1">
            <div class="flex justify-between w-full">
                <div class="flex items-center gap-10">
                    <span class="font-bold text-3xl text-gray-400 flex-1">Zichtbaar</span>
                    <span class="font-bold text-3xl text-gray-400 flex-1">Foto</span>
                    <span class="font-bold text-3xl text-gray-400 flex-1 ml-4">Naam</span>
                </div>
                <div class="flex items-center gap-16">
                    <span class="justify-self-start font-bold text-3xl text-gray-400 flex-1">Categorie</span>
                    <span class="font-bold text-3xl text-gray-400 flex-1">Voorraad</span>
                    <span class="font-bold text-3xl text-gray-400 flex-1 me-6">Bewerken</span>
                </div>
            </div>
        </div>

        <!-- Product List -->
        <div class="bg-gray-200 p-3  rounded-lg w-full h-[520px] overflow-y-auto">
            @foreach($producten as $product)
                <div class="bg-white p-4 rounded-lg flex justify-between items-center mb-3">
                    <div class="flex items-center gap-12 ">
                        <img src="{{ $product->visible ? asset('assets/images/eye.svg') : asset('assets/images/eye-off.svg') }}"
                             alt="Zichtbaar"
                             class="w-20 h-20 cursor-pointer object-cover"
                             wire:click="toggleVisibility({{ $product->product_id }})">
                        <img src="{{ $product->afbeeldingen }}" alt="product picture" class="w-24 h-24 object-cover rounded-lg">
                        <span class="text-3xl font-bold">{{ $product->naam }}</span>
                    </div>
                    <div class="grid grid-cols-3 w-[520px] items-center">
                        <span class="justify-self-start text-3xl font-bold">{{ $product->categorie->naam }}</span>
                        <span class="justify-self-center ml-2 text-3xl font-bold">{{ $product->voorraad }}</span>
                        <a href="{{ route('producten.edit', $product->product_id) }}" class="justify-self-end">
                            <img src="{{ asset('assets/images/gear.svg') }}" alt="product bewerken" class="w-16 h-16 me-7">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pt-3 flex justify-between items-center gap-3">
            <a href="{{ route('settings') }}" class="w-full h-60 bg-orange-200 py-8 rounded-md flex justify-evenly items-center">
                <x-layout.redArrow/>
            </a>
            <a href="{{ route('addProduct') }}" class="w-full h-60 bg-blue-200 py-8 rounded-md flex justify-evenly items-center">
                <img src="{{ asset('assets/images/product_toevegen.svg') }}" alt="product toevoegen" class="w-[25%]">
            </a>
        </div>
    </div>
</x-header>
