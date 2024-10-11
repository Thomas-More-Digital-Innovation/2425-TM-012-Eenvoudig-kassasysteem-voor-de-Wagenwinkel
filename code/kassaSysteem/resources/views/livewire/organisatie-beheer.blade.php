<x-header header="Organisatie Beheer">
    <div class="bg-white p-4 rounded-lg shadow-lg">
        <div class="flex justify-end mb-1">
            <span class="font-bold text-3xl text-gray-400 pe-[212px] ">Naam</span>
            <span class="font-bold text-3xl text-gray-400 pe-3">Instellingen</span>
        </div>
        <div class="flex space-x-3 mb-3">
            <div class="bg-gray-200 p-3 rounded-lg space-y-20">
                <div class="flex items-end">
                    <x-layout.fillIn
                        name="Organisatie"
                        title="Organisatie"
                        placeholder="Naam"
                        width="w-[350px]"
                    />
                    <button class="bg-green-300 rounded-lg ml-3 flex items-center justify-center h-12 w-[112px] ms-2" type="button">
                        <img src="{{ asset('assets/images/plusMark.svg') }}" alt="Toevoegen" class="h-6">
                    </button>
                </div>
                <div>
                    <x-layout.fillIn
                        name="Members aanmaken"
                        title="Members aanmaken"
                        placeholder="Naam"
                        width="w-[472px]"
                    />
                    <x-layout.fillIn
                        name=""
                        title="Wachtwoord"
                        placeholder="Wachtwoord"
                        width="w-[472px]"
                    />
                    <div class="flex items-start">
                        <x-layout.dropDown
                            name=""
                            title="Organisatie"
                            :group="$organisaties"
                            width="w-[350px]"
                        />
                        <button class="bg-green-300 rounded-lg ml-3 flex items-center justify-center h-[52px] w-[112px] mt-1 ms-2" type="button">
                            <img src="{{ asset('assets/images/plusMark.svg') }}" alt="Toevoegen" class="h-6">
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-gray-200 p-3 rounded-lg w-[500px] h-[500px]">
                <?php foreach ($organisaties as $organisatie): ?>
                <div class="bg-white p-4 rounded-lg flex items-center justify-between mb-3">
                    <span class="font-bold text-3xl">{{ $organisatie->naam }}</span>
                    <button wire:click="goMemberPage({{ $organisatie->organisatie_id }})">
                        <img src="{{ asset('assets/images/gear.svg') }}" alt="Instellingen" class="h-12 pe-10 w-auto">
                    </button>

                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="">
            <x-layout.redArrow
                width="w-[496px]"
            />
        </div>
    </div>
</x-header>

