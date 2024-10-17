<x-header header="Login">
    <div class="flex flex-col items-center justify-evenly min-h-screen pb-20 relative">
        <div class="bg-white p-5 shadow-lg rounded-lg relative flex flex-col items-center space-y-5 z-0">
            <img src="{{ asset('assets/images/thomasmore.svg') }}" alt="Thomas More" class="w-[60%] mb-5">

            <form method="POST" action="{{ route('loginSettingsAdminBegeleider') }}">
                @csrf

                <div class="flex flex-col space-y-6 pb-3">
                    <div class="bg-gray-300 rounded-lg p-5 flex-col items-center justify-center">
                        <div class="mb-6">
                            <label for="naam" class="pl-1 block text-3xl text-black font-bold">Naam</label>
                            <div class="relative flex items-center">
                                <input type="text" name="naam" id="naam"
                                       class="w-[500px] h-16 mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl"
                                       placeholder="naam" value="{{ old('naam', $name) }}" required autofocus />
                            </div>
                            @error('naam')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="wachtwoord" class="pl-1 block text-3xl text-black font-bold">Wachtwoord</label>
                            <div class="relative flex items-center">
                                <input type="password" name="wachtwoord" id="wachtwoord"
                                       class="w-[500px] h-16 mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl"
                                       placeholder="Wachtwoord" required />
                            </div>
                            @error('wachtwoord')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex space-x-3">
                    <a href="{{ route('category') }}" class="w-full h-60 bg-red-300 py-8 rounded-md hover:bg-red-200 transition-colors flex justify-center items-center">
                        <img src="{{ asset('assets/images/red_arrow.png') }}" alt="Back" />
                    </a>

                    <x-layout.greenArrow />
                </div>
            </form>
        </div>
    </div>
</x-header>
