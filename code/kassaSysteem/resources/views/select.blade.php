<x-header header="Select Organisatie">
    <div class="bg-white p-4 rounded-lg shadow-lg relative">
        <form method="POST" action="{{ route('submit') }}">
            @csrf
            <x-layout.dropDown
                title="Organisaties"
                :group="$organistaties"
            />
            <x-layout.greenArrow></x-layout.greenArrow>
        </form>
    </div>

    <div class="absolute top-6 right-6">
        <img src="{{ asset('assets/images/gear.png') }}" alt="Instellingen" class="h-16 w-auto">
    </div>
</x-header>
