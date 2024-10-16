<x-layout.exampleLayout
    header="Settings"
    routeLeft=""
    imageLeft="assets/images/sellHistory.svg"
    altLeft="eten"
    routeRight=""
    imageRight="assets/images/gear.svg"
    altRight="nietEten"
>

    <a href="{{route('settings')}}" class="w-full h-60 bg-orange-200 py-8 rounded-md  flex justify-evenly items-center">
        <x-layout.redArrow/>
    </a>
    <?php
    $loginUser = \App\Helpers\Login::getCart();

    $user = \App\Models\User::where('user_Id', $loginUser['user_id'])
        ->where('rol_id', 1)
        ->first();
    ?>

    @if($user)
    <a href="{{ route('organisatie-beheer') }}" class="w-full h-60 bg-purple-300 py-8 rounded-md flex justify-evenly items-center">
        <img src="{{ asset('assets/images/admin.svg') }}" alt="Winkel Wagen" class="w-[30%]">
    </a>
    @else
    @endif

</x-layout.exampleLayout>