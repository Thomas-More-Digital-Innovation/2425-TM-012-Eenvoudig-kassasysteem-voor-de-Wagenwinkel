<x-header header="Verkooplijst">
    <div class="bg-white w-11/12 md:w-4/5 px-4 h-auto min-h-[85vh] rounded-lg flex flex-col justify-between">
        <div class="flex-grow"> <!-- This makes the content area grow -->
            <div class="mt-3" x-data="{ selectedDate: '{{ request()->get('date') ?? '' }}'}">
                <label class="font-bold text-3xl" for="start">Selecteer datum:</label>

                <input
                    class="font-bold text-3xl"
                    type="date"
                    id="date"
                    name="date"
                    x-model="selectedDate"
                    x-on:change="window.location.href = '{{ route('verkooplijst', ['date' => '']) }}' + selectedDate"
                />
            </div>
            <div class="flex flex-col justify-between items-center">
                <div class="mt-5 grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-12 w-full">
                    <span></span>
                    <span class="col-start-2 ms-5 font-bold text-3xl text-gray-400 pe-[212px]">Naam</span>
                    <span class="col-start-3 ms-5 font-bold text-3xl text-gray-400 pe-[212px]">Datum</span>
                    <span class="col-start-5 ms-5 font-bold text-3xl text-gray-400 pe-[212px]">Tijd</span>
                    <span class="col-start-10 font-bold text-3xl text-gray-400 pe-3">Aantal</span>
                    <span class="col-start-11 font-bold text-3xl text-gray-400 pe-3">Prijs</span>
                    <span class="col-start-12 font-bold text-3xl text-gray-400 pe-3">Totaal</span>
                </div>
                <div class="bg-gray-200 w-full h-[500px] md:h-[500px] rounded-lg m-4 p-4 overflow-y-auto">
                    @foreach($verkochteProducten as $product)
                        <div class="bg-white p-2 mb-4 grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-12 gap-2 w-full items-center rounded-lg">
                            <div class="rounded-lg w-[115px] h-[115px]">
                                <img src="{{ $product->product->afbeeldingen }}" alt="{{ $product->product->naam }}" class="object-cover w-full h-full rounded-lg">
                            </div>
                            <p class="ml-4 col-start-2 font-bold text-3xl">{{ $product->product->naam }}</p>
                            <p class="ml-4 col-start-3 col-end-5 font-bold text-3xl">{{ \Carbon\Carbon::parse($product->verkoop->datum_tijd)->format('Y-m-d') }}</p>
                            <p class="ml-4 col-start-5 font-bold text-3xl">{{ \Carbon\Carbon::parse($product->verkoop->datum_tijd)->format('H:i') }}</p>
                            <p class="ml-4 col-start-10 font-bold text-3xl">{{ $product->hoeveelheid }}</p>
                            <p class="ml-4 col-start-11 font-bold text-3xl">{{ number_format($product->verkoopprijs, 2) }}€</p>
                            <p class="ml-4 col-start-12 font-bold text-3xl">{{ number_format($product->verkoopprijs * $product->hoeveelheid, 2) }}€</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flex justify-between items-center w-full mb-4">
            <a href="{{ route('begeleiderSettings') }}">
                <x-layout.redArrow width="w-[250px] md:w-[391px]"></x-layout.redArrow>
            </a>
            <button id="exportBtn" wire:click="exportToExcel" class="btn btn-primary w-[391px] h-60 bg-green-600 hover:bg-green-500 py-8 rounded-md flex justify-evenly items-center">
                <img src="{{ asset('assets/images/ExcelExport.svg') }}" alt="Winkel Wagen" class="w-[30%] fill-current text-white">
            </button>
    </div>
    </div>
</x-header>
<script>
    document.getElementById('exportBtn').addEventListener('click', function() {
        setTimeout(function() {
            location.reload();
        }, 500);
    });
</script>

