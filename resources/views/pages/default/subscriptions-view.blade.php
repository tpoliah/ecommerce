<x-mylayouts.layout-default>

<div class="container my-5">
    @foreach ($subscription_data as $data)
    <div class="card">
        <div class="card-body">
            <h2>{{ $data->title }}</h2>
            <form action="{{ route('subscriptions.purchase', ['id' => $data->id]) }}" method="POST">
                @csrf
                @method('POST')
                <!-- Add a hidden field with the lookup_key of your Price -->
                <input type="hidden" name="lookup_key" value="{{ $data->lookup_key }}" />
                <button id="checkout-and-portal-button" type="submit">Checkout</button>
            </form>
        </div>
    </div>
    @endforeach

</div>

</x-mylayouts.layout-default>