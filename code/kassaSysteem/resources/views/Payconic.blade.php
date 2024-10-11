<x-header header="Payconic">
    <div class="bg-white w-4/5 h-[85vh] rounded-lg flex flex-col justify-between items-center">
        <div class="bg-gray-200 h-[630px] p-4 rounded-lg w-[1471px] mb-4  mt-4 flex justify-center items-center">
            <img src="{{ asset('assets/images/qr-code.png') }}" alt="qr code">
        </div>
        <div class="flex justify-between items-center mb-4 w-[1471px]">
            <div class="">
                <form action="{{ route('soortBetalen') }}" method="GET">

                    @csrf
                    <x-layout.redArrow width="w-[391px]"></x-layout.redArrow>
                </form>
            </div>
            <p class=" w-full text-center total-font-size inter-text">Totaal: {{ \App\Helpers\Shopping_cart::getPrice()}} €</p>
            <div class="">
                <form action="{{ route('success') }}" method="get">
                    @csrf
                    <x-layout.greenArrow width="w-[391px]"></x-layout.greenArrow>
                </form>
            </div>
        </div>
    </div>
</x-header>
