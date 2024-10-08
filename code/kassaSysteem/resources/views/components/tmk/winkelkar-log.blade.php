@php
    use App\Helpers\Shopping_cart;
@endphp

@props([
    'record' => 15      // default value is 15
])

{{-- show this (debug) code only in development APP_ENV=local  --}}
@env('local')
    {{--<x-tmk.section x-data="{ show: true }" @dblclick="show = !show" class="bg-yellow-50 mt-8 cursor-pointer">--}}
        <p class="font-bold">What's inside my basket?</p>
        <div x-show="show" x-cloak>
            @php
                $detailedCartData = [
                    'Cart::getCart()' => Shopping_cart::getCart(),
                    'Cart::getRecords()' => Shopping_cart::getRecords(),
                ];
            /*    $inlineCartData = [
                    'Cart::getKeys()' => Cart::getKeys(),
                    'Cart::getTotalPrice()' => Cart::getTotalPrice(),
                    'Cart::getTotalQty()' => Cart::getTotalQty(),
                ];*/
            @endphp

            @foreach ($detailedCartData as $label => $data)
                <hr class="my-4">
                <p class="text-rose-800 font-bold">{{ $label }}:</p>
                <pre class="text-sm">@json($data, JSON_PRETTY_PRINT)</pre>
            @endforeach

            <hr class="my-4">
            @foreach ($inlineCartData as $label => $data)
                <p>
                    <span class="text-rose-800 font-bold pr-2">{{ $label }}:</span>
                    @json($data, JSON_PRETTY_PRINT)
                </p>
            @endforeach
        </div>
    {{--</x-tmk.section>--}}
@endenv
