<x-header header="producten beheren">
    <div class="w-[1390px] h-[85vh] bg-white p-5 rounded-lg shadow-lg relative flex flex-col justify-around">
        <div class="grid bg-gray-200 grid-cols-8 rounded-lg grid-rows-3 gap-2">
            <table class="border-separate border-spacing-y-2"> <!-- Adds space between rows -->
                <thead>
                                <tr>
                                    <th>Zichtbaar</th>
                                    <th>Foto</th>
                                    <th>Naam</th>
                                    <th>Categorie</th>
                                    <th>Prijs</th>
                                    <th>Voorraad</th>
                                    <th>Positie</th>
                                    <th>Bewerken</th>
                                </tr>
                </thead>
                <tbody>
                @foreach($producten as $product)
                    <tr class="bg-white">
                        <td><img src="{{ asset('assets/images/eye.svg') }}" alt="Zichtbaar" class="w-[60%]"></td>
                        <td>
                            <img src="{{ $product->afbeeldingen }}" alt="product picture" class="w-[60%]">
                        </td>
                        <td>{{ $product->naam }}</td>
                        <td>{{ $product->categorie_id }}</td>
                        <td>{{ $product->actuele_prijs }}</td>
                        <td>{{ $product->voorraad }}</td>
                        <td>{{ $product->positie }}</td>
                        <td>
                            <a href="{{ route('producten.edit', $product->product_id) }}">
                            <img src="{{ asset('assets/images/gear.svg') }}" alt="product bewerken" class="w-[60%]">
                            </a>
                        </td>

                        {{--                        <td>--}}
{{--                                                <a href="{{ route('producten.edit', $product->id) }}">Bewerken</a>--}}
{{--                                                <a href="{{ route('producten.destroy', $product->id) }}">Verwijderen</a>--}}
{{--                        </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pt-2">
            <a href="{{ route('settings') }}">
                <x-layout.redArrow width="w-[391px]"></x-layout.redArrow>
            </a>
            <a href="{{route('addProduct')}}" class="w-[391px] h-60 bg-blue-200 py-8 rounded-md  flex justify-evenly items-center">
                <img src="{{ asset('assets/images/product_toevegen.svg') }}" alt="product toevoegen" class="w-[30%]">
            </a>
        </div>
    </div>
</x-header>
