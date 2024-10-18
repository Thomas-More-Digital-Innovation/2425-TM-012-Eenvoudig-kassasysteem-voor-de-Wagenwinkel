<x-header header="{{ session('change_password') ? 'Change Password' : 'Login' }}">
    <div class="flex flex-col items-center justify-evenly min-h-screen pb-20">
        <img src="{{ asset('assets/images/thomasmore.svg') }}" alt="test" class="w-[60%]">
        <div class="bg-white p-5 shadow-lg rounded-lg relative">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="flex space-x-3 pb-3">
                        <div class="bg-gray-300 rounded-lg p-5 flex-col items-center justify-center">
                            <div class="mb-6">
                                <label for="naam" class="pl-1 block text-3xl text-black font-bold">Naam</label>
                                <input type="text" name="naam" id="naam" class="w-[500px] h-16 mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" placeholder="naam" required autofocus autocomplete="username" />

                                @error('naam')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="wachtwoord" class="pl-1 block text-3xl text-black font-bold">Wachtwoord</label>
                                <input type="password" name="wachtwoord" id="wachtwoord" class="w-[500px] h-16 mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" placeholder="Wachtwoord" required autocomplete="current-password" />

                                @error('wachtwoord')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <x-layout.greenArrow />
                    </div>
                </form>
        </div>
    </div>
</x-header>
