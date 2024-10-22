<x-header header="Organisatie Beheer">
    @php
        $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
        if (is_null($organisation)) {
            header("Location: /"); // Redirect to the home page
            exit; // Terminate the script
        }
    @endphp
    <div class="bg-white p-5 rounded-lg shadow-lg">
        <div class="flex justify-end mb-1">
            <span class="font-bold text-3xl text-gray-400 pe-[212px]">Naam</span>
            <span class="font-bold text-3xl text-gray-400 pe-3">Instellingen</span>
        </div>

        @if (session()->has('message'))
            <div id="flash-message" class="bg-green-300 p-3 rounded-lg text-white text-center mb-3">
                {{ session('message') }}
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('flash-message').style.display = 'none';
                }, 3000);
            </script>
        @endif

        <div class="flex space-x-3 mb-3">
            <div class="bg-gray-200 w-[560px] p-3 rounded-lg space-y-20">
                <div class="flex items-end">
                    <div>
                        <label for="organisatie" class="pl-1 block text-3xl text-black font-bold">Organisatie</label>
                        <div class="relative flex items-center">
                            <input type="text" wire:model="organisatieNaam" class="w-full h-12 mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" placeholder="Organisatie" required />
                        </div>
                    </div>
                    <button class="bg-green-300 rounded-lg ml-3 flex items-center justify-center h-12 w-[112px]" type="button" wire:click="addOrganisatie">
                        <img src="{{ asset('assets/images/plusMark.svg') }}" alt="Toevoegen" class="h-6">
                    </button>
                </div>
                <div>
                    <div>
                        <label for="Members aanmaken" class="pl-1 block text-3xl text-black font-bold">Gebruikers aanmaken</label>
                        <div class="relative flex items-center">
                            <input type="text" wire:model="memberNaam" name="Members aanmaken" class="w-full h-12 mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" placeholder="Naam" required />
                        </div>
                    </div>
                    <div class="flex items-start">
                        <label for="organization" class="block text-3xl text-black font-bold"></label>
                        <div class="relative">
                            <select name="Organisatie" wire:model="organisatieKeuze" class="w-[420px] text-gray-500 appearance-none mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" required>
                                <option value="none" selected="selected" hidden>Kies Organisatie</option>
                                @foreach ($organisaties as $organisatie)
                                    <option value="{{ $organisatie['organisatie_id'] }}">{{ $organisatie['naam'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="bg-green-300 rounded-lg ml-3 flex items-center justify-center h-[52px] w-[112px] mt-1 ms-2" type="button" wire:click="addMember">
                            <img src="{{ asset('assets/images/plusMark.svg') }}" alt="Toevoegen" class="h-6">
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-gray-200 p-3 rounded-lg w-[560px] h-[520px] overflow-y-auto">
                @foreach ($organisaties as $organisatie)
                    <div class="bg-white p-4 rounded-lg flex items-center justify-between mb-3">
                        <span class="font-bold text-3xl">{{ $organisatie->naam }}</span>
                        <button wire:click="goMemberPage({{ $organisatie->organisatie_id }})">
                            <img src="{{ asset('assets/images/gear.svg') }}" alt="Instellingen" class="h-12 pe-10 w-auto">
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="">
            <a href="{{ route('begeleiderSettings') }}">
                <x-layout.redArrow width="w-full" />
            </a>
        </div>
    </div>
</x-header>
