<div>
    <h1>Cart</h1>

    @if ( \App\Helpers\Login::getCart()['organisatie_id'])

        <ul>
            <li>
                {{ \App\Helpers\Login::getCart()['organisatie_id'] }}
            </li>
        </ul>

    @else
        <p>Your session is empty.</p>
    @endif


</div>
