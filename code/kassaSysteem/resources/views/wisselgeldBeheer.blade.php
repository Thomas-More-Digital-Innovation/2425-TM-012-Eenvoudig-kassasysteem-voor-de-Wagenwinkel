<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisselgeld Beheer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-blue-400 h-screen flex items-center justify-center relative">
<div class="bg-white p-4 rounded-lg shadow-lg">
    <div class="bg-gray-200 p-4 rounded-lg mb-3">
        <div class="flex flex-col gap-2">
            <div class="flex justify-between gap-2">
                <img class="w-[225px]" src="{{ asset('assets/images/money/50.png') }}" alt="50 euro">
                <img class="w-[225px]" src="{{ asset('assets/images/money/20.png') }}" alt="20 euro">
                <img class="w-[112px]" src="{{ asset('assets/images/money/2.png') }}" alt="2 euro">
                <img class="w-[112px]" src="{{ asset('assets/images/money/1.png') }}" alt="1 euro">
                <img class="w-[112px]" src="{{ asset('assets/images/money/_50.png') }}" alt="50 cent">
            </div>
            <div class="flex justify-between gap-2">
                    <span class="bg-white rounded-lg shadow-lg w-[225px] p-2 text-center text-2xl font-bold">
                        {{ $money[0]['amount'] }}
                    </span>
                <span class="bg-white rounded-lg shadow-lg w-[225px] p-2 text-center text-2xl font-bold">
                        {{ $money[1]['amount'] }}
                    </span>
                <span class="bg-white rounded-lg shadow-lg w-[112px] p-2 text-center text-2xl font-bold">
                        {{ $money[4]['amount'] }}
                    </span>
                <span class="bg-white rounded-lg shadow-lg w-[112px] p-2 text-center text-2xl font-bold">
                        {{ $money[5]['amount'] }}
                    </span>
                <span class="bg-white rounded-lg shadow-lg w-[112px] p-2 text-center text-2xl font-bold">
                        {{ $money[6]['amount'] }}
                    </span>
            </div>
            <div class="flex justify-between gap-2">
                <img class="w-[225px]" src="{{ asset('assets/images/money/10.png') }}" alt="10 euro">
                <img class="w-[225px]" src="{{ asset('assets/images/money/5.png') }}" alt="5 euro">
                <img class="w-[112px]" src="{{ asset('assets/images/money/_20.png') }}" alt="20 cent">
                <img class="w-[112px]" src="{{ asset('assets/images/money/_10.png') }}" alt="10 cent">
                <img class="w-[112px]" src="{{ asset('assets/images/money/_5.png') }}" alt="5 cent">
            </div>
            <div class="flex justify-between gap-2">
                    <span class="bg-white rounded-lg shadow-lg w-[225px] p-2 text-center text-2xl font-bold">
                        {{ $money[2]['amount'] }}
                    </span>
                <span class="bg-white rounded-lg shadow-lg w-[225px] p-2 text-center text-2xl font-bold">
                        {{ $money[3]['amount'] }}
                    </span>
                <span class="bg-white rounded-lg shadow-lg w-[112px] p-2 text-center text-2xl font-bold">
                        {{ $money[7]['amount'] }}
                    </span>
                <span class="bg-white rounded-lg shadow-lg w-[112px] p-2 text-center text-2xl font-bold">
                        {{ $money[8]['amount'] }}
                    </span>
                <span class="bg-white rounded-lg shadow-lg w-[112px] p-2 text-center text-2xl font-bold">
                        {{ $money[9]['amount'] }}
                    </span>
            </div>
        </div>
    </div>
    <x-layout.redArrow width="w-[240px]"></x-layout.redArrow>
</div>
</body>
</html>
