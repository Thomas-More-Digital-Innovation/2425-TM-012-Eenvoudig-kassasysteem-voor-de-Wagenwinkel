<x-header header="Wisselgeld Beheer">
    <div class="bg-white p-4 rounded-lg shadow-lg">
        <div class="bg-gray-200 p-4 rounded-lg mb-3">
            <div class="flex flex-col gap-2">
                <div class="flex justify-between gap-10">
                    <img class="w-[225px]" src="{{ asset('assets/images/money/50.png') }}" alt="50 euro">
                    <img class="w-[225px]" src="{{ asset('assets/images/money/20.png') }}" alt="20 euro">
                    <img class="w-[112px]" src="{{ asset('assets/images/money/2.png') }}" alt="2 euro">
                    <img class="w-[112px]" src="{{ asset('assets/images/money/1.png') }}" alt="1 euro">
                    <img class="w-[112px]" src="{{ asset('assets/images/money/_50.png') }}" alt="50 cent">
                </div>
                <form method="POST" action="{{ route('updateWisselgeld') }}">
                    @csrf
                <div class="flex justify-between gap-2 mb-8">
                    @if(isset($wisselgeldRecords) && count($wisselgeldRecords) > 0)
                        <input type="number" name="test" value="{{ 0 }}" class="bg-white rounded-lg shadow-lg w-[225px] p-2 text-center text-2xl font-bold" />
                        <input type="number" name="hoeveelheid[1]" value="{{ $wisselgeldRecords[1]['hoeveelheid']}}" class="bg-white rounded-lg shadow-lg w-[225px] p-2 text-center text-2xl font-bold" />
                        <input type="number" name="hoeveelheid[4]" value="{{ $wisselgeldRecords[4]['hoeveelheid']}}" class="bg-white rounded-lg shadow-lg w-[112px] p-2 text-center text-2xl font-bold" />
                        <input type="number" name="hoeveelheid[5]" value="{{ $wisselgeldRecords[5]['hoeveelheid']}}" class="bg-white rounded-lg shadow-lg w-[112px] p-2 text-center text-2xl font-bold" />
                        <input type="number" name="hoeveelheid[6]" value="{{ $wisselgeldRecords[6]['hoeveelheid']}}" class="bg-white rounded-lg shadow-lg w-[112px] p-2 text-center text-2xl font-bold" />
                    @else
                        <p>No records found.</p>
                    @endif
                </div>

                <div class="flex justify-between gap-2">
                    <img class="w-[225px]" src="{{ asset('assets/images/money/10.png') }}" alt="10 euro">
                    <img class="w-[225px]" src="{{ asset('assets/images/money/5.png') }}" alt="5 euro">
                    <img class="w-[112px]" src="{{ asset('assets/images/money/_20.png') }}" alt="20 cent">
                    <img class="w-[112px]" src="{{ asset('assets/images/money/_10.png') }}" alt="10 cent">
                    <img class="w-[112px]" src="{{ asset('assets/images/money/_5.png') }}" alt="5 cent">
                </div>
                    <div class="flex justify-between gap-2 mb-8">
                        @if(isset($wisselgeldRecords) && count($wisselgeldRecords) > 0)
                            <input type="number" name="hoeveelheid[0]" value="{{ $wisselgeldRecords[0]['hoeveelheid']}}" class="bg-white rounded-lg shadow-lg w-[225px] p-2 text-center text-2xl font-bold" />
                            <input type="number" name="hoeveelheid[3]" value="{{ $wisselgeldRecords[1]['hoeveelheid']}}" class="bg-white rounded-lg shadow-lg w-[225px] p-2 text-center text-2xl font-bold" />
                            <input type="number" name="hoeveelheid[7]" value="{{ $wisselgeldRecords[4]['hoeveelheid']}}" class="bg-white rounded-lg shadow-lg w-[112px] p-2 text-center text-2xl font-bold" />
                            <input type="number" name="hoeveelheid[8]" value="{{ $wisselgeldRecords[5]['hoeveelheid']}}" class="bg-white rounded-lg shadow-lg w-[112px] p-2 text-center text-2xl font-bold" />
                            <input type="number" name="hoeveelheid[9]" value="{{ $wisselgeldRecords[6]['hoeveelheid']}}" class="bg-white rounded-lg shadow-lg w-[112px] p-2 text-center text-2xl font-bold" />
                        @else
                            <p>No records found.</p>
                        @endif
                    </div>
                    <button type="submit" class="bg-blue-500 text-white rounded-lg px-4 py-2 font-bold">Update</button>
                </form>
            </div>
        </div>
        <x-layout.redArrow width="w-[240px]"></x-layout.redArrow>
    </div>
</x-header>

