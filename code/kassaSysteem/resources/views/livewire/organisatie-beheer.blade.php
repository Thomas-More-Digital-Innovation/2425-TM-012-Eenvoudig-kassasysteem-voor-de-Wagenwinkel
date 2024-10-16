<x-header header="Organisatie Beheer">
    <div class="bg-white p-4 rounded-lg shadow-lg">
        <div class="flex justify-end mb-1">
            <span class="font-bold text-3xl text-gray-400 pe-[212px]">Naam</span>
            <span class="font-bold text-3xl text-gray-400 pe-3">Instellingen</span>
        </div>

        <div class="flex space-x-3 mb-3">
            <div class="bg-gray-200 p-3 rounded-lg space-y-8"> <!-- Reduced space-y from 20 to 8 for better layout -->
                <!-- Organisatie Aanmaken -->
                <div class="flex items-end">
                    <div>
                        <label for="organisatie" class="pl-1 block text-3xl text-black font-bold">Organisatie</label>
                        <div class="relative flex items-center">
                            <input type="text" wire:model="organisatieNaam" class="w-[350px] h-12 mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" placeholder="Organisatie" required />
                        </div>
                    </div>
                    <button class="bg-green-300 rounded-lg ml-3 flex items-center justify-center h-12 w-[112px]" type="button" wire:click="addOrganisatie">
                        <img src="{{ asset('assets/images/plusMark.svg') }}" alt="Toevoegen" class="h-6">
                    </button>
                </div>

                <!-- Member Aanmaken -->
                <div class="pt-5">
                    <label for="members" class="pl-1 block text-3xl text-black font-bold">Members aanmaken</label>
                    <div class="relative flex items-center mb-2">
                        <input type="text" wire:model="memberNaam" class="w-[472px] h-12 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" placeholder="Naam" required />
                    </div>
                    <div class="relative flex items-center mb-2">
                        <input type="password" wire:model="memberWachtwoord" class="w-[472px] h-12 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" placeholder="Wachtwoord" required />
                    </div>
                    <div class="flex items-start">
                        <select name="organisatie" wire:model="organisatieKeuze" class="w-[350px] text-gray-500 appearance-none mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" required>
                            <option value="none" selected hidden>Kies Organisatie</option>
                            @foreach ($organisaties as $organisatie)
                                <option value="{{ $organisatie->organisatie_id }}">{{ $organisatie->naam }}</option>
                            @endforeach
                        </select>
                        <button class="bg-green-300 rounded-lg ml-3 flex items-center justify-center h-[52px] w-[112px] mt-1 ms-2" type="button" wire:click="addMember">
                            <img src="{{ asset('assets/images/plusMark.svg') }}" alt="Toevoegen" class="h-6">
                        </button>
                    </div>
                </div>
            </div>

            <!-- Organisaties List -->
            <div class="bg-gray-200 p-3 rounded-lg w-[500px] h-[500px] overflow-y-auto">
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

        <!-- Red Arrow -->
        <div>
            <x-layout.redArrow width="w-[496px]" />
        </div>
    </div>
</x-header>
