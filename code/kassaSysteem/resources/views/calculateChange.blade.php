<x-header header="Geld terug geven">
    <div class="bg-white p-4 rounded-lg shadow-lg">
        @isset($result)
            <div class="bg-gray-200 p-3 rounded-lg mb-3">
                <div class="grid grid-cols-5 gap-4">
                    @php
                        $totalItems = 0;
                    @endphp
                    @foreach ($result as $change)
                        @for ($i = 0; $i < $change['quantity']; $i++)
                            <div class="relative w-[230px] cash-item" data-index="{{ $totalItems }}">
                                <img
                                    src="{{ asset('assets/images/money/' . $change['name'] . '.png') }}"
                                    class="h-[112px] p-2 mx-auto mb-2 cash-image"
                                    alt="{{ $change['name'] }}"
                                >
                            </div>
                            @php
                                $totalItems++;
                            @endphp
                        @endfor
                    @endforeach
                    @for ($i = $totalItems; $i < 12; $i++)
                        <div class="h-[112px] w-[220px] mx-auto mb-2"></div>
                    @endfor
                </div>
            </div>

            <div class="flex justify-between items-center space-x-8">
                <a href="{{ route('cashIngeven') }}">
                    <x-layout.redArrow width="w-80"></x-layout.redArrow>
                </a>

                <p class="text-center mb-4 text-4xl font-bold">
                    Wisselgeld: € {{ number_format($amount_given - $total_cost, 2) }}
                </p>

                <a href="{{ route('success') }}">
                    <x-layout.greenArrow width="w-80"></x-layout.greenArrow>
                </a>
            </div>

        @endisset
    </div>
</x-header>

<script>
    // JavaScript to toggle the 'vinkje' overlay
    document.querySelectorAll('.cash-item').forEach(item => {
        item.addEventListener('click', function () {
            // Check if an overlay image already exists
            let vinkjeOverlay = this.querySelector('.vinkje-overlay');

            if (vinkjeOverlay) {
                // If the overlay exists, remove it
                vinkjeOverlay.remove();
            } else {
                // If the overlay doesn't exist, create it
                vinkjeOverlay = document.createElement('img');
                vinkjeOverlay.src = "{{ asset('assets/images/money/vinkje.png') }}";
                vinkjeOverlay.classList.add('vinkje-overlay');
                vinkjeOverlay.classList.add('absolute', 'top-0', 'left-0', 'w-[90%]', 'h-[90%]');
                this.appendChild(vinkjeOverlay);
            }
        });
    });
</script>

