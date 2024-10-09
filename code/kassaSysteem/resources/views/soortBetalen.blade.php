<x-header header="Kies betaling">
    <div class="bg-white p-4 rounded-lg shadow-lg w-3/5 h-[90vh] flex flex-col justify-between">
        <div class="flex gap-2">
            <div class="bg-gray-300 rounded-lg shadow-lg p-4  basis-1/2  flex items-center justify-center">
                <img src="{{ asset('assets/images/payconiq.svg') }}" alt="Menu" class="w-[60%] h-[60%] object-contain">
            </div>
            <div class="bg-gray-300 rounded-lg shadow-lg text-center text-2xl font-bold p-4 flex-grow basis-1/2 aspect-square flex items-center justify-center">
                <img src="{{ asset('assets/images/cash.svg') }}" alt="Instellingen" class="w-[50%] h-[50%] object-contain">
            </div>
        </div>
        <div class="flex gap-2 mt-4 h-full">
            <a href="{{route('winkelmand')}}" class="flex h-full w-2/4">
                <x-layout.redArrow height="h-full" />
            </a>
        </div>
    </div>
</x-header>
