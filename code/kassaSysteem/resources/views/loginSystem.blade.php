<x-header header="Login">
    <div class="flex flex-col items-center justify-evenly min-h-screen pb-20">
        <img src="{{ asset('assets/images/thomasmore.svg') }}" alt="test" class="w-[60%]">

        <!-- Login Form -->
        <div class="bg-white p-5 shadow-lg rounded-lg relative">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="flex space-x-3 pb-3">
                    <div class="bg-gray-300 rounded-lg p-5 flex-col items-center justify-center">
                        <div class="mb-6">
                            <label for="name" class="pl-1 block text-3xl text-black font-bold">Name</label>
                            <div class="relative flex items-center">
                                <input type="text" name="name" id="name" class="w-[500px] h-16 mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" placeholder="Name" required autofocus />
                            </div>

                            @error('name')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="pl-1 block text-3xl text-black font-bold">Password</label>
                            <div class="relative flex items-center">
                                <input type="password" name="password" id="password" class="w-[500px] h-16 mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" placeholder="Password" required />
                            </div>

                            @error('password')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex space-x-3">

                        <x-layout.greenArrow />

                </div>
            </form>
        </div>
    </div>
</x-header>
