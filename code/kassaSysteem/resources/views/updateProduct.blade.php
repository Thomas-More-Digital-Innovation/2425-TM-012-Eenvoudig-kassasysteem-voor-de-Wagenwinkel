<x-header header="Product bewerken">
    <div class="w-[1390px] h-[85vh] bg-white p-5 rounded-lg shadow-lg relative flex flex-col justify-around">
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-4 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-200 text-red-800 p-4 rounded-lg">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('producten.update', $product->product_id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" value="{{ old('naam', $product->naam) }}" required>

            <label for="actuele_prijs">Prijs:</label>
            <input type="number" id="actuele_prijs" name="actuele_prijs" value="{{ old('actuele_prijs', $product->actuele_prijs) }}" required>

            <label for="afbeeldingen">Afbeelding:</label>
            <input type="file" id="afbeeldingen" name="afbeeldingen" accept=".png">

            <label for="categorie_id">Categorie ID:</label>
            <input type="number" id="categorie_id" name="categorie_id" value="{{ old('categorie_id', $product->categorie_id) }}" required>

            <label for="positie">Positie:</label>
            <input type="number" id="positie" name="positie" value="{{ old('positie', $product->positie) }}" required>

            <label for="voorraad">Voorraad:</label>
            <input type="number" id="voorraad" name="voorraad" value="{{ old('voorraad', $product->voorraad) }}" required>

            <label for="voorraadAanvullen">Voorraad Aanvullen:</label>
            <input type="checkbox" id="voorraadAanvullen" name="voorraadAanvullen" {{ old('voorraadAanvullen', $product->voorraadAanvullen) ? 'checked' : '' }}>

            <button type="submit">Product bijwerken</button>
        </form>

        <form method="POST" action="{{ route('producten.destroy', $product->product_id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Weet je zeker dat je dit product wilt verwijderen?')">Product verwijderen</button>
        </form>

        <div class="pt-2">
            <a href="{{ route('manage-products') }}">
                <x-layout.redArrow width="w-[391px]"></x-layout.redArrow>
            </a>
        </div>
    </div>
</x-header>
