<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>winkelmand</title>
    <style>
        .cross {
            position: relative;
        }
        .cross::before, .cross::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: white;
            top: 50%;
            left: 0;
        }
        .cross::before {
            transform: rotate(45deg);
        }
        .cross::after {
            transform: rotate(-45deg);
        }
        .marked img {
            display: none;
        }
    </style>
</head>
<body>
<div class="bg-blue-300 flex justify-center items-center h-screen">
    <div class="bg-white w-[90vw] h-[85vh] rounded-lg flex flex-col justify-between items-center">
        <div class="bg-gray-200 rounded-lg w-[95%] h-[60vh] mt-4 p-4">
            <div class="grid grid-cols-12 gap-2 w-full sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-12">
                <?php
                $totalItems = 48;
                $itemCount = count($items);


                $gridItems = array_fill(0, $totalItems, null);

                foreach ($items as $item) {
                    $gridItems[$item['position'] - 1] = $item;
                }

                foreach ($gridItems as $gridItem): ?>
                <div class="w-full h-24 sm:h-32 md:h-40 lg:h-32 flex items-center justify-center item" data-id="{{ $gridItem['id'] ?? '' }}">
                        <?php if ($gridItem): ?>
                    <img src="{{ $gridItem['imagePath'] }}" alt="Image {{ $gridItem['name'] }}" class="object-cover w-full h-full">
                    <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center"></div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="flex justify-between items-center mb-7 w-full">
            <div class="mx-4">
                <form action="{{ route('category') }}" method="GET">
                    @csrf
                    <x-layout.redArrow width="w-80"></x-layout.redArrow>
                </form>
            </div>
            <p class="w-full text-center text-lg sm:text-xl md:text-2xl lg:text-3xl">Totaal: {{ \App\Helpers\Shopping_cart::getPrice() }} €</p>
            <div class="mx-4">
                <form action="{{ route('empty.cart') }}" method="POST">
                    @csrf
                    <x-layout.greenArrow width="w-80"></x-layout.greenArrow>
                </form>
            </div>
        </div>
    </div>
</div>

@stack('script')

<script>
    document.querySelectorAll('.item').forEach(item => {
        item.addEventListener('click', function () {
            if (this.classList.contains('removed')) {
                this.style.display = 'none';
            } else {
                this.classList.add('marked', 'bg-red-500', 'cross', 'removed');
            }
        });
    });
</script>

</body>
</html>
