<x-layout.exampleLayout
    header="Settings"
    routeLeft=""
    imageLeft="assets/images/menu.svg"
    altLeft="eten"
    routeRight=""
    imageRight="assets/images/settings.svg"
    altRight="nietEten"
>

    <a href="{{route('category')}}" class="w-full h-60 bg-orange-200 py-8 rounded-md  flex justify-evenly items-center">
        <x-layout.redArrow/>
    </a>
    <a href="{{route('logout')}}" class="w-full h-60 bg-orange-200 py-8 rounded-md  flex justify-evenly items-center">
        <img src="{{ asset('assets/images/logout.svg') }}" alt="Winkel Wagen" class="w-[30%]">
    </a>

</x-layout.exampleLayout>
