<x-layout.exampleLayout
    header="Select Categorie"
    routeLeft="{{ route('products', ['categoryId' => 1]) }}"
    imageLeft="assets/images/eten.svg"
    altLeft="eten"
    routeRight="{{ route('products', ['categoryId' =>2]) }}"
    imageRight="assets/images/nietEten.svg"
    altRight="nietEten"
>
    <a href="{{route('winkelmand')}}" class="w-full h-60 bg-orange-200 py-8 rounded-md  flex justify-evenly items-center">
        <?php for ($i = 0; $i < 3; $i++): ?>
            <img src="{{ asset('assets/winkelmand.svg') }}" alt="Winkel Wagen" class="w-[16%]">
        <?php endfor; ?>
    </a>

</x-layout.exampleLayout>

<a href="{{route('settings')}}">
    <img class="absolute top-[2vw] right-[2vw] cursor-pointer w-[4vw] filter brightness-0 invert" src="{{ asset('assets/images/gear.svg') }}" alt="Settings">
</a>
