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
                            <div class="w-[230px]">
                                <img
                                    src="{{ asset('assets/images/money/' . $change['name'] . '.png') }}"
                                    class="h-[112px] p-2 mx-auto mb-2"
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
                    €{{ number_format($amount_given - $total_cost, 2) }}
                </p>

                <a href="{{ route('success') }}">
                    <x-layout.greenArrow width="w-80"></x-layout.greenArrow>
                </a>
            </div>

        @endisset
    </div>
</x-header>
