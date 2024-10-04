<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Organization</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-400 h-screen flex items-center justify-center relative">

<div class="bg-white p-4 rounded-lg shadow-lg">
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

</body>
</html>
