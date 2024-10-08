<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Begeleider instellingen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-400 h-screen flex items-center justify-center relative">

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Startscherm Verkoop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="m-0 p-0 bg-blue-400 flex justify-center items-center h-screen">

<body class="m-0 p-0 bg-blue-400 flex justify-center items-center h-screen">
<div class="bg-white p-4 rounded-lg shadow-lg w-3/5 h-[90vh] flex flex-col justify-between">
    <div class="flex gap-2">
        <div
            class="bg-gray-300 rounded-lg shadow-lg text-center text-2xl font-bold p-4 flex-grow basis-1/2 aspect-square flex items-center justify-center">
            <img src="{{ asset('assets/images/menu.png') }}" alt="Menu" class="w-[50%] h-[50%] object-contain">
        </div>
        <div
            class="bg-gray-300 rounded-lg shadow-lg text-center text-2xl font-bold p-4 flex-grow basis-1/2 aspect-square flex items-center justify-center">
            <img src="{{ asset('assets/images/settings.png') }}" alt="Instellingen" class="w-[50%] h-[50%] object-contain">
        </div>
    </div>

    <div class="flex gap-2 mt-4 h-full">
        <x-layout.redArrow class="flex-grow h-full" width="w-2/4" />

        <a href="{{route('select')}}" class="w-2/4 h-full bg-orange-200 py-8 rounded-lg shadow-lg flex-grow flex justify-center items-center">
            <img src="{{ asset('assets/images/logout.png') }}" alt="">
        </a>
    </div>
</div>



</body>





</body>
</html>


</body>
</html>
