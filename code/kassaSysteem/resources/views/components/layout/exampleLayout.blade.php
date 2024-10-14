<x-header header="{{ $header }}">
    <div class="bg-white p-5 shadow-lg rounded-lg relative">
        <div class="flex space-x-3 pb-3">
            <div class="bg-gray-300 rounded-lg text-center {{ $paddingLeft ?? "p-20" }} flex items-center justify-center">
                <a href="{{ $routeLeft  }}">
                    <img src="{{ asset( $imageLeft) }}" alt="{{ $altLeft }}" class="h-{{ $volumeLeft ?? 400 }} w-{{ $volumeLeft ?? 400 }} object-contain aspect-square">
                </a>
            </div>
            <div class="bg-gray-300 rounded-lg text-center p-20 flex items-center justify-center ">
                <a href="{{ $routeRight }}">
                        <img src="{{ asset( $imageRight) }}" alt="{{ $altRight }}" class="h-{{ $volumeRight ?? 400 }} w-{{ $volumeRight ?? 400 }} object-contain aspect-square">
                </a>
            </div>
        </div>
        <div class="flex space-x-3">
            {{ $slot }}
        </div>
    </div>
</x-header>
