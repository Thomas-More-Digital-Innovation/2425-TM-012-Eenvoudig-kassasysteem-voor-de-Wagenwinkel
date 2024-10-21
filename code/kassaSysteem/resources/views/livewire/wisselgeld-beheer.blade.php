<div>
    @if (session()->has('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg  mb-4">
            {{ session('success') }}
        </div>
    @endif
    <x-header header="Wisselgeld Beheer">
        <div class="bg-white p-5 rounded-lg shadow-lg">
            <div class="bg-gray-200 w-[1133px] h-[560px] p-4 rounded-lg mb-3">
                <div class="flex flex-col gap-10">
                    <div class="flex justify-between gap-20">
                        <img class="w-[225px]" src="{{ asset('assets/images/money/50.png') }}" alt="50 euro">
                        <img class="w-[225px]" src="{{ asset('assets/images/money/20.png') }}" alt="20 euro">
                        <img class="w-[112px]" src="{{ asset('assets/images/money/2.png') }}" alt="2 euro">
                        <img class="w-[112px]" src="{{ asset('assets/images/money/1.png') }}" alt="1 euro">
                        <img class="w-[112px]" src="{{ asset('assets/images/money/_50.png') }}" alt="50 cent">
                    </div>
                        <div class="flex justify-between gap-2 mb-8">
                            @if(isset($wisselgeldRecords) && count($wisselgeldRecords) > 0)
                                <input type="number" wire:model="stockChange.1"  class="bg-white rounded-lg shadow-lg w-[225px] p-2 text-center text-2xl font-bold" />
                                <input type="number" wire:model="stockChange.2" class="bg-white rounded-lg shadow-lg w-[225px] p-2 text-center text-2xl font-bold" />
                                <input type="number" wire:model="stockChange.5" class="bg-white rounded-lg shadow-lg w-[112px] p-2 text-center text-2xl font-bold" />
                                <input type="number" wire:model="stockChange.6" class="bg-white rounded-lg shadow-lg w-[112px] p-2 text-center text-2xl font-bold" />
                                <input type="number" wire:model="stockChange.7" class="bg-white rounded-lg shadow-lg w-[112px] p-2 text-center text-2xl font-bold" />
                            @else
                                <p>No records found.</p>
                            @endif
                        </div>

                        <div class="flex justify-between gap-2">
                            <img class="w-[225px]" src="{{ asset('assets/images/money/10.png') }}" alt="10 euro">
                            <img class="w-[225px]" src="{{ asset('assets/images/money/5.png') }}" alt="5 euro">
                            <img class="w-[112px]" src="{{ asset('assets/images/money/_20.png') }}" alt="20 cent">
                            <img class="w-[112px]" src="{{ asset('assets/images/money/_10.png') }}" alt="10 cent">
                            <img class="w-[112px]" src="{{ asset('assets/images/money/_5.png') }}" alt="5 cent">
                        </div>
                        <div class="flex justify-between gap-2 mb-8">
                            @if(isset($wisselgeldRecords) && count($wisselgeldRecords) > 0)
                                <input type="number" wire:model="stockChange.3" class="bg-white rounded-lg shadow-lg w-[225px] p-2 text-center text-2xl font-bold" />
                                <input type="number" wire:model="stockChange.4" class="bg-white rounded-lg shadow-lg w-[225px] p-2 text-center text-2xl font-bold" />
                                <input type="number" wire:model="stockChange.8" class="bg-white rounded-lg shadow-lg w-[112px] p-2 text-center text-2xl font-bold" />
                                <input type="number" wire:model="stockChange.9" class="bg-white rounded-lg shadow-lg w-[112px] p-2 text-center text-2xl font-bold" />
                                <input type="number" wire:model="stockChange.10" class="bg-white rounded-lg shadow-lg w-[112px] p-2 text-center text-2xl font-bold" />
                            @else
                                <p>No records found.</p>
                            @endif
                        </div>
                </div>
            </div>
            <div class="flex justify-between w-full gap-3">
                <a href="{{ route('instellingen-beheer') }}" class="w-full">
                    <x-layout.redArrow width="w-full"></x-layout.redArrow>
                </a>

                <button wire:click="updateWisselgeld" class="w-full">
                    <div  class="w-full h-60 bg-orange-200 py-8 rounded-md  flex justify-evenly items-center">
                        <img src="{{ asset('assets/images/update.svg') }}" alt="Winkel Wagen" class="w-[30%]">
                    </div>
                </button>

            </div>
        </div>
    </x-header>
</div>
