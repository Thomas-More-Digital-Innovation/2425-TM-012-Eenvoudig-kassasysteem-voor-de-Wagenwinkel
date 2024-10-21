<x-header header="Members">
    <div class="bg-white p-5 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-1">
            <div class="flex justify-start ml-6">
                <span class="font-bold text-3xl text-gray-400">Naam</span>
            </div>
            <div class="flex justify-end items-center space-x-8"> <!-- Align items to the right -->
                <span class="font-bold text-3xl text-gray-400">Wachtwoord Wijzigen</span>
                <span class="font-bold text-3xl text-gray-400">Verwijder</span> <!-- Always show Verwijder -->
            </div>
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

        <div class="bg-gray-200 p-3 rounded-lg w-[1132px] h-[520px] overflow-y-auto">
            @foreach ($users as $user)
                <div class="bg-white p-4 rounded-lg flex justify-between items-center mb-3" style="min-height: 60px;">
                    <div class="flex justify-start items-center">
                        <span class="text-xl font-bold pr-5">{{ $user->naam }}</span>
                    </div>
                    <div class="flex justify-end items-center space-x-10">
                        <label for="toggle{{ $user->id }}" class="flex items-center cursor-pointer">
                            <div class="relative">
                                <button class="ml-40" wire:click="updatePassword({{ $user->user_Id }})">
                                    <x-toggle-button :checked="$user->wachtwoordWijzigen" />
                                </button>
                            </div>
                        </label>
                        <div class="flex items-center" style="min-width: 50px;">
                            @if ($user->naam !== 'Isabelle')
                                <button class="ml-40" wire:click="deleteMember({{ $user->user_Id }})">
                                    <img src="{{ asset('assets/images/bin.svg') }}" alt="vuilbak" class="w-13 h-13">
                                </button>
                            @else
                                <div class="h-13 mr-56" style="min-height: 61px;"></div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pt-3 flex justify-between w-full gap-3">
            <div class="flex w-full">
                <a href="{{ route('organisatie-beheer') }}" class="w-full">
                    <x-layout.redArrow/>
                </a>
            </div>

            @if (!$this->isAdmin())
                <div class="flex justify-center w-full">
                    <button onclick="confirmDeleteOrganization({{ $organisatie_id }})" class="{{ $width ?? 'w-full' }} h-60 bg-gray-200 rounded-md hover:bg-gray-300 transition-colors flex justify-center items-center px-4 py-2">
                        <img src="{{ asset('assets/images/bin.svg') }}" alt="vuilbak" class="w-[100px]">
                    </button>
                </div>
            @endif
        </div>
    </div>
    <script>
        function confirmDeleteOrganization(organisatieId) {
            if (confirm("Weet je zeker dat je deze organisatie en alle leden wilt verwijderen?")) {
                @this.call('deleteOrganizationAndMembers', organisatieId);
            }
        }
    </script>
</x-header>
