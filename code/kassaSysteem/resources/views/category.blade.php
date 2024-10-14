<x-layout.exampleLayout
    header="Select Categorie"
    routeLeft="{{ route('products', ['categoryId' => 1]) }}"
    imageLeft="assets/images/eten.png"
    altLeft="eten"
    routeRight="{{ route('products', ['categoryId' =>2]) }}"
    imageRight="assets/images/nietEten.png"
    altRight="nietEten"
>
    <?php
    $products = \App\Helpers\Shopping_cart::getRecords();
    $totaalItems = 0;

    foreach ($products as $product) {
        $totaalItems += $product['aantal'];
    }
    ?>

    <a href="{{route('winkelmand')}}" class="w-full h-60 bg-orange-200 py-8 rounded-md  flex justify-evenly items-center">
        <img src="{{ asset('assets/winkelmand.svg') }}" alt="Winkel Wagen" class="w-[16%]">
        <div class="flex flex-col text-center text-2xl">
            <span>In winkelmand</span>

            <span class="font-bold">{{ $totaalItems }} </span>
        </div>

    </a>

</x-layout.exampleLayout>

<a href="{{route('settings')}}">
    <img class="absolute top-[2vw] right-[2vw] cursor-pointer w-[4vw] filter brightness-0 invert" src="{{ asset('assets/images/gear.svg') }}" alt="Settings">
</a>
