<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $header }}</title>
</head>
<body class="bg-blue-400 h-screen flex items-center justify-center relative">
{{ $slot }}
@stack('script')
</body>
</html>
