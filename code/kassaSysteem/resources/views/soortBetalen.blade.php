<x-layout.exampleLayout
    header="Kies betaling"
    routeLeft="{{ route('payconic') }}"
    imageLeft="assets/images/GSM.svg"
    altLeft="payconiq"
    routeRight="{{ route('cashIngeven') }}"
    imageRight="assets/images/cash.svg"
    altRight="cash"
>

    <a href="{{route('winkelmand')}}" class="w-full h-60 py-8 rounded-md  flex justify-start items-center">
        <x-layout.redArrow width="w-[560px]" />
    </a>

</x-layout.exampleLayout>

