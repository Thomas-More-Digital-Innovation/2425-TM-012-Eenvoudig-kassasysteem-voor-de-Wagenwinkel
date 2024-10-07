<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-blue-400 h-screen flex items-center justify-center relative">
<div class="bg-gray-200 p-4 rounded-lg mb-3">
    <div class="flex justify-between items-center mb-7 w-full">
        <div class="mx-4">

        </div>
        <div class="mx-4">
        </div>
    </div>
    <div class="flex justify-between items-center mb-7 w-full">
        <div class="mx-4">
            <form {{--action="{{ route('') }}"--}} method="GET"> {{--route naar vorige pagina nog aanpassen--}}
                @csrf
                <x-layout.redArrow width="w-[233px]"></x-layout.redArrow>
            </form>
        </div>
       <div class="mx-4">
            <form action="{{ route('empty.cart') }}" method="POST">
                @csrf
                <x-layout.greenArrow width="w-[233px]"></x-layout.greenArrow>
            </form>
        </div>
    </div>
</div>
</body>
</html>
