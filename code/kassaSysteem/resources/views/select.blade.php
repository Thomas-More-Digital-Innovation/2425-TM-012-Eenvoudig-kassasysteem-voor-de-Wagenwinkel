<x-header header="Select Organisatie">
    <div class="bg-white p-4 rounded-lg shadow-lg relative">
        <form method="POST" action="{{ route('submit') }}">
            @csrf
            <div class="bg-gray-200 p-3 rounded-lg mb-3">
                <x-layout.dropDown
                    name="Organisaties"
                    title="Organisaties"
                    :group="$organistaties"
                    
                />
            </div>
            <x-layout.greenArrow></x-layout.greenArrow>
        </form>
    </div>

    <div class="absolute top-6 right-6">
        <img src="{{ asset('assets/images/gear.png') }}" alt="Instellingen" class="h-16 w-auto">
    </div>
</x-header>
