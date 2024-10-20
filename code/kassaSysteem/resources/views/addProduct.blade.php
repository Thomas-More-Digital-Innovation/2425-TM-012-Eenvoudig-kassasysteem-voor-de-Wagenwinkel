<x-header header="product toevegen">
    <div class="w-[1390px] h-[85vh] bg-white p-5 rounded-lg shadow-lg relative flex flex-col justify-around">
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <label for="name">Naam:</label>
            <input type="text" id="name" name="name" required>

            <label for="price">Actuele Prijs:</label>
            <input type="number" step="0.01" id="price" name="actuele_prijs" required>

            <label for="image">Afbeelding URL:</label>
            <input type="text" id="image" name="afbeeldingen">

            <label for="organization">Organisatie ID:</label>
            <input type="number" id="organization" name="organisatie_id" required>

            <label for="category">Categorie ID:</label>
            <input type="number" id="category" name="categorie_id" required>

            <label for="position">Positie:</label>
            <input type="number" id="position" name="positie">

            <label for="stock">Voorraad:</label>
            <input type="number" id="stock" name="voorraad" required>

            <label for="replenish_stock">Voorraad Aanvullen:</label>
            <input type="checkbox" id="replenish_stock" name="voorraadAanvullen" value="1">

            <button type="submit">Toevoegen</button>
        </form>
        <div class="pt-2">
            <a href="{{ route('manageProducts') }}">
                <x-layout.redArrow width="w-[391px]"></x-layout.redArrow>
            </a>
        </div>
    </div>
</x-header>
