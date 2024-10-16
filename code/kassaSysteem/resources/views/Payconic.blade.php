<x-header header="Payconic">
    <div class="bg-white w-4/5 h-[85vh] rounded-lg flex flex-col justify-between items-center px-4">
        <div class="bg-gray-200 h-[630px] rounded-lg w-full mb-4  mt-4 flex justify-center items-center">
            <img src="{{ asset('assets/images/qr-code.png') }}" alt="qr code">
        </div>
        <div class="flex justify-between items-center mb-4 w-full">
            <div class="">
                <form action="{{ route('soortBetalen') }}" method="GET">
                    @csrf
                    <x-layout.redArrow width="w-[250px] md:w-[391px]"></x-layout.redArrow>
                </form>
            </div>
            <p class=" w-full text-center text-4xl inter-text">Totaal: € {{ number_format(\App\Helpers\Shopping_cart::getPrice(),2, ',', '.')}} </p>
            <div class="">
                <form action="{{ route('success') }}" method="get">
                    @csrf
                    <x-layout.greenArrow width="w-[250px] md:w-[391px]"></x-layout.greenArrow>
                </form>
            </div>
        </div>
    </div>
</x-header>
