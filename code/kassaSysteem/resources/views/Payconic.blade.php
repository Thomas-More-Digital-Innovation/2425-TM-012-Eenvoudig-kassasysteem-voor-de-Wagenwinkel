<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payconic</title>
</head>
<body>
<div class="bg-blue-300 flex justify-center items-center h-screen">
    <div class="bg-white w-4/5 h-[85vh] rounded-lg flex flex-col justify-between items-center">
        <div class="bg-gray-200 h-[500px] rounded-lg w-11/12 mt-4 flex justify-center items-center">
            <img src="{{ asset('assets/images/qr-code.png') }}" alt="qr code">
        </div>
        <div class="flex justify-between items-center mb-7 w-full">
            <div class="mx-4">
                <form action="{{ route('category') }}" method="GET">
                    @csrf
                    <x-layout.redArrow width="w-80"></x-layout.redArrow>
                </form>
            </div>
            <p class=" w-full text-center total-font-size inter-text">Totaal: {{ \App\Helpers\Shopping_cart::getPrice()}} €</p>
            <div class="mx-4">
                <form action="{{ route('empty.cart') }}" method="POST">
                    @csrf
                    <x-layout.greenArrow width="w-80"></x-layout.greenArrow>
                </form>
            </div>
        </div>
</div>

@stack('script')
</body>
</html>
