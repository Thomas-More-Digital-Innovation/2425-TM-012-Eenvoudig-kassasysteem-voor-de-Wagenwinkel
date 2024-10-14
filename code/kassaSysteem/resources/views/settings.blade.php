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
    <form method="POST" action="{{ route('logout') }}"  class="w-full h-60 bg-orange-200 py-8 rounded-md  flex justify-evenly items-center">
        @csrf
        <button class="w-full h-auto flex justify-center">
            <img src="{{ asset('assets/images/logout.svg') }}" alt="Winkel Wagen" class="w-[30%]">
        </button>
    </form>

</x-layout.exampleLayout>
