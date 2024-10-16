<x-header header="Members">
    <div class="bg-white p-4 rounded-lg shadow-lg">

        <div class="flex justify-between items-center">
            <!-- Naam links uitgelijnd -->
            <div class="flex justify-start ml-6">
                <span class="font-bold text-3xl text-gray-400">Naam</span>
            </div>

            <!-- Wachtwoord wijzigen en Verwijder rechts uitgelijnd -->
            <div class="flex justify-end space-x-8">
                <span class="font-bold text-3xl text-gray-400">Wachtwoord Wijzigen</span>
                <span class="font-bold text-3xl text-gray-400">Verwijder</span>
            </div>
        </div>

        <div class="bg-gray-200 p-3 rounded-lg w-[1008px] h-[500px] overflow-y-auto">
            @foreach ($users as $user)
                <div class="bg-white p-4 rounded-lg flex justify-between items-center mb-3">
                    <!-- Naam aan de linkerkant -->
                    <div class="flex justify-start items-center">
                        <span class="text-xl font-bold pr-5">{{ $user->naam }}</span>
                    </div>

                    <!-- Wachtwoord wijzigen toggle en verwijderknop aan de rechterkant -->
                    <div class="flex justify-end items-center space-x-10">
                        <!-- Wachtwoord wijzigen toggle -->
                        <label for="toggle{{ $user->id }}" class="flex items-center cursor-pointer">
                            <div class="relative">
                                <!-- Hidden checkbox -->
                                <input id="toggle{{ $user->id }}" type="checkbox" class="sr-only"
                                       wire:click="toggleResetPassword({{ $user->id }})"
                                    {{ $user->reset_password ? 'checked' : '' }}>
                                <!-- Background of the toggle -->
                                <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                <!-- Dot in the toggle -->
                                <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition
                                    {{ $user->reset_password ? 'translate-x-full bg-green-500' : '' }}"></div>
                            </div>
                        </label>

                        <a href="#" onclick="document.getElementById('delete-form-{{ $user->user_Id }}').submit()">
                            <img src="{{asset('assets/images/bin.svg')}}" alt="vuilbak" class="ml-40 mr-2">
                        </a>

                        <form id="delete-form-{{ $user->user_Id }}" action="{{ route('members-beheer.destroy', ['user_Id' => $user->user_Id]) }}" method="post" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                    </div>
                </div>
            @endforeach
        </div>


        <!-- Rode pijl onderaan -->
        <div class="pt-3">
            <a href="{{route('organisatie-beheer')}}">
                <x-layout.redArrow width="w-[496px]" />
            </a>
        </div>
    </div>
</x-header>
