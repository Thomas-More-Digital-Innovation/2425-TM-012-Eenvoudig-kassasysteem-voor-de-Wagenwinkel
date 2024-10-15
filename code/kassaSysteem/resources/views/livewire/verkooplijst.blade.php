<x-header header="Winkelmand">
        <div class="bg-white w-11/12 md:w-4/5 px-4 h-auto min-h-[85vh] rounded-lg">
            <div class=" mt-3">
                <label for="start">Selecteer datum:</label>

                <input  onchange="{{ route('verkooplijst') }}" type="date" id="date" name="date" value="{{ date("Y/m/d")  }}"/>

            </div>
            <div class="flex flex-col justify-between items-center">
            <div class="mt-5 grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-12 w-full">
                <p></p>
                <p>Naam</p>
                <p>Aantal</p>
                <p>Prijs</p>
                <p>Totaal</p>
            </div>
            <div class="bg-gray-200 w-full h-[400px] md:h-[600px] rounded-lg m-4 p-4 overflow-y-auto">
                @foreach($verkochteProducten as $product)
                    <div class="bg-white h-[100px] mb-4 grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-12 gap-2 w-full">
                        <div class="rounded-lg">
                            <img src="{{ $product->product->afbeeldingen }}" alt="{{ $product->product->naam }}" class="h-[90%] rounded-lg">
                        </div>
                        <p class="ml-4 offset">{{ $product->product->naam }}</p>
                        <p class="ml-4">{{ $product->hoeveelheid }}</p>
                        <p class="ml-4">{{ $product->verkoopprijs }}</p>
                        <p class="ml-4">{{ $product->verkoopprijs * $product->hoeveelheid}}</p>
                    </div>
              @endforeach
            </div>
        </div>
        <div class="flex justify-between items-center mb-4 w-full">
            <a href="{{ route('settings') }}">
                <x-layout.redArrow width="w-[250px] md:w-[391px]"></x-layout.redArrow>
            </a>
        </div>
    </div>
</x-header>

