<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Startscherm Verkoop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="m-0 p-0 bg-blue-400 flex justify-center items-center h-screen">

<div class="bg-white w-3/5 h-[90vh] flex flex-wrap justify-between p-[1vw] rounded-lg">
    <a href="{{route('food')}}" class="bg-gray-300 w-[49.5%] h-[70%] flex justify-center items-center rounded-lg cursor-pointer">
        <img src="{{asset("assets/food.png")}}" alt="Food" class="w-[45%] h-[50%]">
    </a>

    <a href="{{route('noFood')}}" class="bg-gray-300 w-[49.5%] h-[70%] flex justify-center items-center rounded-lg cursor-pointer">
        <img src="{{asset("assets/nofood.png")}}" alt="No Food" class="w-[60%] h-[60%]">
    </a>

    <a href="{{route('winkelmand')}}" class="bg-orange-200 w-[100%] h-[29%] mt-[0.5vw] flex justify-evenly items-center rounded-lg cursor-pointer">
        <img src="{{asset("assets/winkelmand.png")}}" alt="Winkelmand" class="w-[14%] h-[70%]">
        <img src="{{asset("assets/winkelmand.png")}}" alt="Winkelmand" class="w-[14%] h-[70%]">
        <img src="{{asset("assets/winkelmand.png")}}" alt="Winkelmand" class="w-[14%] h-[70%]">
    </a>
</div>
<a href="{{route('settings')}}">
    <img class="absolute top-[2vw] right-[2vw] cursor-pointer w-[4vw]" src="{{asset("assets/instellingen.png")}}" alt="Settings">
</a>
</body>
</html>
