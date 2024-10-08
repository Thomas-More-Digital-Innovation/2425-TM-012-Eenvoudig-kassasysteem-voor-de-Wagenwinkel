<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Success</title>
    <script>
        setTimeout(function() {
            window.location.href = "{{ route('category') }}";
        }, 1500);
    </script>
</head>
<body>
{{ $slot }}
@stack('script')
</body>
</html>
