<x-header header="Product bewerken">
    <div class="w-[1390px] h-[85vh] bg-white p-5 rounded-lg shadow-lg relative flex flex-col justify-around">
        <form method="POST" action="{{ route('producten.update', $product->product_id) }}">
            @csrf
            @method('PUT')

            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" value="{{ $product->naam }}" required>

            <label for="actuele_prijs">Prijs:</label>
            <input type="number" id="actuele_prijs" name="actuele_prijs" value="{{ $product->actuele_prijs }}" required>

            <label for="afbeeldingen">Afbeelding:</label>
            <input type="text" id="afbeeldingen" name="afbeeldingen" value="{{ $product->afbeeldingen }}" required>

            <label for="organisatie_id">Organisatie ID:</label>
            <input type="number" id="organisatie_id" name="organisatie_id" value="{{ $product->organisatie_id }}" required>

            <label for="categorie_id">Categorie ID:</label>
            <input type="number" id="categorie_id" name="categorie_id" value="{{ $product->categorie_id }}" required>

            <label for="positie">Positie:</label>
            <input type="number" id="positie" name="positie" value="{{ $product->positie }}" required>

            <label for="voorraad">Voorraad:</label>
            <input type="number" id="voorraad" name="voorraad" value="{{ $product->voorraad }}" required>

            <label for="voorraadAanvullen">Voorraad Aanvullen:</label>
            <input type="checkbox" id="voorraadAanvullen" name="voorraadAanvullen" {{ $product->voorraadAanvullen ? 'checked' : '' }}>

            <button type="submit">Product bijwerken</button>
        </form>

        <form method="POST" action="{{ route('producten.destroy', $product->product_id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Weet je zeker dat je dit product wilt verwijderen?')">Product verwijderen</button>
        </form>

        <div class="pt-2">
            <a href="{{ route('manageProducts') }}">
                <x-layout.redArrow width="w-[391px]"></x-layout.redArrow>
            </a>
        </div>
    </div>
</x-header>
