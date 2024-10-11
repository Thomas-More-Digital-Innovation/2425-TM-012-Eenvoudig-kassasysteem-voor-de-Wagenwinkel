<x-header header="Login">
    <div class="flex flex-col items-center justify-evenly min-h-screen pb-20">
        <img src="{{ asset('assets/images/thomasmore.svg') }}" alt="test" class="w-[60%]">
        <div class="bg-white p-5 shadow-lg rounded-lg relative">
            <div class="flex space-x-3 pb-3">
                <div class="bg-gray-300 rounded-lg  p-5 flex-col items-center justify-center">
                    <div class="mb-6">
                        <label for="naam" class="pl-1 block text-3xl text-black font-bold">Naam</label>
                        <div class="relative flex items-center">
                            <input type="text" name="naam" id="naam" class="w-[500px] h-16 mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" placeholder="Naam" required />
                        </div>
                    </div>
                    <div>
                        <label for="wachtwoord" class="pl-1 block text-3xl text-black font-bold">Wachtwoord</label>
                        <div class="relative flex items-center">
                            <input type="text" name="wachtwoord" id="wachtwoord" class="w-[500px] h-16 mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" placeholder="Wachtwoord" required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex space-x-3">
                <a href="{{route('category')}}" class="w-full h-60 bg-orange-200 py-8 rounded-md  flex justify-evenly items-center">
                    <x-layout.greenArrow/>
                </a>
            </div>
        </div>
    </div>

</x-header>
