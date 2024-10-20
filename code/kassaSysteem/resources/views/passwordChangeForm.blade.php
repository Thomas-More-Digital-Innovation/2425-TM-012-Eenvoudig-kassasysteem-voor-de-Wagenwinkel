<x-header header="Change Password">
    <div class="flex flex-col items-center justify-evenly min-h-screen pb-20">
        <img src="{{ asset('assets/images/thomasmore.svg') }}" alt="test" class="w-[60%]">

        <!-- Password Change Form -->
        <div class="bg-white p-5 shadow-lg rounded-lg relative">
            <form id="changePasswordForm" action="{{ route('password.change') }}" method="POST" onsubmit="return validatePasswords(event)">
                @csrf
                <div class="flex space-x-3 pb-3">
                    <div class="bg-gray-300 rounded-lg p-5 flex-col items-center justify-center">

                        <!-- Gebruikersnaam die is meegestuurd -->
                        <div class="mb-6">
                            <label for="user_name" class="pl-1 block text-2xl text-black font-bold">Naam</label>
                            <input type="text" id="user_name" name="user_name" value="{{ session('user_name') }}" readonly class="w-[500px] h-12 mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" placeholder="Naam"/>
                        </div>

                        <div class="mb-6">
                            <label for="new_password" class="pl-1 block text-2xl text-black font-bold">Nieuw Wachtwoord</label>
                            <input type="password" id="new_password" name="new_password" required class="w-[500px] h-12 mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" placeholder="Wachtwoord" />
                        </div>

                        <div class="mb-6">
                            <label for="new_password_confirmation" class="pl-1 block text-2xl text-black font-bold">Confirm New Password</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" required class="w-[500px] h-12 mt-1 block py-2 pr-10 pl-3 border border-gray-300 bg-white font-bold rounded-lg text-3xl" placeholder="Wachtwoord" />
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

    <script>
        // Functie om wachtwoorden te valideren
        function validatePasswords(event) {
            const newPassword = document.getElementById('new_password');
            const confirmPassword = document.getElementById('new_password_confirmation');

            // Reset de styles
            newPassword.classList.remove('border-red-500');
            confirmPassword.classList.remove('border-red-500');

            // Valideer of de wachtwoorden overeenkomen
            if (newPassword.value !== confirmPassword.value) {
                // Voorkom het verzenden van het formulier
                event.preventDefault();

                // Maak de velden leeg
                newPassword.value = '';
                confirmPassword.value = '';

                // Voeg een rode rand toe aan de invoervelden
                newPassword.classList.add('border-red-500');
                confirmPassword.classList.add('border-red-500');

                return false;  // Blijf op dezelfde pagina
            }

            // Als wachtwoorden overeenkomen, wordt het formulier ingediend en doorgestuurd
            return true;
        }
    </script>
</x-header>
